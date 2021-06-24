<?php
use App\Models\Image;
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Mt Rainier</title>
</head>
<body>

<h3>Camp Muir</h3>
<p><a href="{{ route('cam', Image::CAMP_MUIR) }}"><img src="{{ asset("storage/{$camp_muir->image}") }}" width="400" alt="Camp Muir"></a></p>

<h3>Mountain</h3>
<p><a href="{{ route('cam', Image::MOUNTAIN) }}"><img src="{{ asset("storage/{$mountain->image}") }}" width="400" alt="Mt Rainier"></a></p>


</body>
</html>

