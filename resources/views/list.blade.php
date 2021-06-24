<?php
use App\Models\Image;
/** @var Image $image */
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Mt Rainier</title>
</head>
<body>

<table>
@foreach($images as $image)
  <tr>
    <td>{{ $image->id }}</td>
    <td>{{ $image->image }}</td>
    <td>{{ $image->last_modified->setTimezone('America/Los_Angeles')->format('YYYY/M/d H:i') }}</td>
  </tr>
@endforeach
</table>

</body>
</html>

