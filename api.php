<?php
    $dir = "YOUR_DIRECTORY/";
    $ext_to_show = array("pdf","doc","docx","xls","xlsx","txt","pps","odt");// only formats supports in google view api
    $target = "_self";
    $no_files = "No personal files";

    $files_to_show = array();
    if ($handle = opendir($dir))
    {
       while (false !== ($file = readdir($handle)))
       {
          if ($file != "." && $file != ".." && is_file($dir.$file))
          {
             $ext = (pathinfo($dir.$file));
             if(in_array(strtolower($ext['extension']), $ext_to_show))
             {
                $files_to_show[] = $file;
             }
          }
       }
       closedir($handle);
    }
    if(empty($files_to_show))
    {
       echo $no_files;
    }
    else
    {
       sort($files_to_show);
       foreach ($files_to_show as $file)
       {
          echo ' &bull; <a href="http://YOUR_URL/'.$dir. $file.'&embedded=true" target="'. $target. '">'. $file ."</a><br>\n";
       }
    }
?>