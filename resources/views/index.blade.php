<?php
use App\Models\Image;
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Mt Rainier</title>
</head>
<style>
  body {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    text-align: center;
  }
</style>
<body>

<h3>Camp Muir</h3>
<p>{{ $camp_muir->last_modified->setTimezone('America/Los_Angeles')->format('m/d h:i A') }}</p>
<p><a href="{{ route('cam', Image::CAMP_MUIR) }}"><img src="{{ asset("storage/{$camp_muir->image}") }}" width="400" alt="Camp Muir"></a></p>

<h3>Mountain</h3>
<p>{{ $mountain->last_modified->setTimezone('America/Los_Angeles')->format('m/d h:i A') }}</p>
<p><a href="{{ route('cam', Image::MOUNTAIN) }}"><img src="{{ asset("storage/{$mountain->image}") }}" width="400" alt="Mt Rainier"></a></p>


</body>
</html>

