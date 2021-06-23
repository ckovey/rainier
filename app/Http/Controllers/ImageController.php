<?php

namespace App\Http\Controllers;

use App\Models\Image;

class ImageController extends Controller {
  public function index() {
    return view('images', ['images' => Image::where('cam','=', 'muir_east')->get()]);
  }
}
