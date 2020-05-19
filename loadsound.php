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

  $selected_filename = $sound_files[ rand(0, count($sound_files)-1)];

  //for IR SM4 Files:
  $year = substr($selected_filename, 8, 4);
  $month = date("M", mktime(0, 0, 0, substr($selected_filename, 12, 2)));
  $day = substr($selected_filename, 14, 2);
  $time = substr($selected_filename, 17, 2) .":".substr($selected_filename, 19, 2) .":".substr($selected_filename, 21, 2);

  $selected_filepath =  $audio_files_dir ."/". $selected_filename;

  //echo $selected_file;

  echo json_encode( array( "filepath"=> $selected_filepath, "filename"=> $selected_filename, "year"=>$year, "month"=>$month, "day"=>$day, "time"=>$time));

?>