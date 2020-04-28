
<head>

  <title>Nature Wav</title>

  <link href="style.css" rel="stylesheet" type="text/css"/>
    
  <link href="style-smallscreen.css" media="screen and (max-width: 800px)" rel="stylesheet" type="text/css"/>
 

  <script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>

 <script src="https://unpkg.com/wavesurfer.js"></script>


<?php

  $audio_files_dir = "/audio_files/IRAIR";

  $dir = dirname(__FILE__) . $audio_files_dir;
  $files = scandir($dir);

  $sound_files = array();

  for($i=0; $i<count($files);$i++){
    if($files[$i] != "." && $files[$i] != ".."){
      array_push($sound_files, $files[$i]);
    }
  }

  $sound_file_sel = $sound_files[ rand(0, count($sound_files)-1)];

  //for IR SM4 Files:
  $year = substr($sound_file_sel, 8, 4);
  $month = substr($sound_file_sel, 12, 2);
  $day = substr($sound_file_sel, 14, 2);
  $time = substr($sound_file_sel, 17, 2) .":".substr($sound_file_sel, 19, 2) .":".substr($sound_file_sel, 21, 2);

?>

<script>

$( document ).ready(function() {

  var wavesurfer = WaveSurfer.create({
      container: '#sound',
      waveColor: '#FFF',
      responsive: true,
      progressColor: '#0FF',
      normalize: true,
      cursorWidth: 4,
      cursorColor: '#FFF',
      barGap: 1
  });


  wavesurfer.on('ready', function () {
      $("#loading").hide();
      wavesurfer.play();
  });

  wavesurfer.load('<?php echo $audio_files_dir ."/". $sound_file_sel; ?>');

});




</script>

</head>

<body>
  <div id="sound-info-all">
    <div id="sound-info-name">
        <div class="file-name">file: <?php echo $sound_file_sel; ?></div>
        <div id="sound-title">ISLE ROYAL NAT'L PARK</div>
    </div>
    <div id="sound-info-date">
      <div class="date-entry wider"><?php echo $year; ?></div>
      <div class="date-entry"><?php echo $month;//date("F", mktime(0,0,0, $month+1, 0, 0)); ?></div>
      <div class="date-entry"><?php echo $day; ?></div>
      <div class="date-entry wider"><?php echo $time; ?></div>
    </div>

  </div>
  <div id="loading">loading...</div>
  <div id="sound"></div>


</body>

</html>