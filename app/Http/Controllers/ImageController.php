<?php

namespace App\Http\Controllers;

use App\Models\Image;

class ImageController extends Controller {
  public function index() {
    return view('index', [
      'camp_muir' => Image::where('cam','=', Image::CAMP_MUIR)->orderBy('id', 'desc')->get()->first(),
      'mountain' => Image::where('cam','=', Image::MOUNTAIN)->orderBy('id', 'desc')->get()->first()
    ]);
  }

  public function cam($cam) {
    return view('images', [
      'images' => Image::where('cam','=', $cam)->orderBy('id', 'desc')->limit(300)->get()->reverse(),
      'title' => $cam === Image::MOUNTAIN ? "Mount Rainier 14,411'" : "Camp Muir 10,188'"
    ]);
  }

  public function list($cam) {
    return view('list', [
      'images' => Image::where('cam','=', $cam)->get()
    ]);
  }
}
