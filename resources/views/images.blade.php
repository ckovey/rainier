<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Time Lapse</title>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type='text/javascript' src='mTimeLapse.js'></script>
  <style>
    * {
      margin:0px;
      padding:0px;
      font-family:sans-serif;
    }

    body {
      text-align: center;
    }

    input {
      background-color: slategray;
      padding:4px 12px;
      margin:4px;
      width:100px;
      color: rgb(250,252,255);
      border:0px;
    }

    input:hover {
      cursor: pointer;
      color:white;
    }

    #frames {
      width:98%;
    }

    #frame_front,
    #frame_back {
      position: absolute;
      top:10px;
      left:10px;
      width:98%;
    }

    #controls {
      width:98%;
      position: fixed;
      bottom: 60px;
      left:10px;
      color:slategray;
      margin:10px auto;
    }

    #data_stamp {
      font-family: monospace;
    }

    #mTimeLapse {
      display: none;
    }
  </style>
</head>
<body>
<div id="mTimeLapse">
  @foreach($images as $image)
    <img src="{{ asset("storage/{$image->image}") }}"
         data-stamp="{{ $image->last_modified->setTimezone('America/Los_Angeles')->format('H:i') }}" alt="img"/>
  @endforeach
</div>
</body>
</html>

