<?php

namespace App\Console\Commands;

use App\Models\Image;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CheckImages extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'check-images';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Checks image headers and downloads when new';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle() {

    $this->fetchImage(Image::CAMP_MUIR);
    $this->fetchImage(Image::MOUNTAIN);

    return 0;
  }

  private function fetchImage($cam) {
    $baseUri = 'https://www.nps.gov';
    $client = new Client(['base_uri' => $baseUri]);

    $lastImage = Image::where('cam', '=', $cam)->orderBy('id', 'desc')->get()->first();

    $res = $client->request('HEAD', "/webcams-mora/{$cam}.jpg");
    $etag = $res->getHeader('ETag')[0];
    $lastModified = Carbon::parse($res->getHeader('Last-Modified')[0]);
    $path = "{$cam}/{$lastModified->format('Y-m-d-H-i')}.jpg";

    if (!$lastImage || $lastImage->etag !== $etag) {
      $this->info("Creating new image $path $etag");
      $img = Image::create([
        'cam' => $cam,
        'image' => $path,
        'etag' => $etag,
        'last_modified' => $lastModified
      ]);
      $img->save();
      $contents = file_get_contents("{$baseUri}/webcams-mora/{$cam}.jpg");
      Storage::disk('public')->put($path, $contents);
    }
  }
}
