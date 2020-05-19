
<head>

  <title>Nature Wav</title>

  <link href="style.css" rel="stylesheet" type="text/css"/>
    
  <link href="style-smallscreen.css" media="screen and (max-width: 800px)" rel="stylesheet" type="text/css"/>
 

  <script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>

 <script src="https://unpkg.com/wavesurfer.js"></script>




<script>



$( document ).ready(function() {

  var wavesurfer = WaveSurfer.create({
      container: '#sound',
      waveColor: '#FFF',
      responsive: true,
      progressColor: '#0FF',
      normalize: true,
      cursorWidth: 2,
      cursorColor: '#FFF',
      barGap: 1
  });


  wavesurfer.on('ready', function () {
      $("#loading").hide();
      wavesurfer.play();
  });


  wavesurfer.on('finish', function () {
      $("#loading").show();
      loadNewSound();
  });

  function loadNewSound(){
    $.get("loadsound.php").done(function( data ) {
      //alert( "Data Loaded: " + data );
      var FileObj = JSON.parse(data);
      //alert("File: " + FileObj.filename);

      $(".file-name").html("file: " + FileObj.filename);
      $("#year").html(FileObj.year);
      $("#month").html(FileObj.month);
      $("#day").html(FileObj.day);
      $("#time").html(FileObj.time);

      wavesurfer.load(FileObj.filepath);

    });
  }

  loadNewSound();
  

});




</script>

</head>

<body>
<div id="wrapper">
  <video src="bg_videos/NatureWavBG-01.mp4" muted autoplay loop></video>
  
  <div id="soundwraper">
    <div id="sound-info-all">
      <div id="sound-info-name">
          <div class="file-name"></div>
          <div id="sound-title">ISLE ROYAL NAT'L PARK</div>
      </div>
      <div id="sound-info-date">
        <div id="year"  class="date-entry wider"> </div>
        <div id="month" class="date-entry"> </div>
        <div id="day"   class="date-entry"> </div>
        <div id="time"  class="date-entry wider"> </div>
      </div>

    </div> <!-- sound-info-all -->
    <div id="loading">loading...</div>
    <div id="sound"></div>
  </div> <!-- soundwraper -->

</div> <!-- wrapper -->

</body>

</html>