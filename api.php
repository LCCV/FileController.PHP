<!DOCTYPE HTML>
<html>
   <head>
      <title>FileController.PHP</title>
<style type="text/css">
body
{
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 16px;
   text-decoration: none;
}
a:link, a:visited
{
   color: #000000;
   text-decoration: none;
}
a:hover
{
   color: #808080;
}
</style>
</head>
<body>
<?php
$dir = "admin/";
$ext_to_show = array("pdf","doc","docx","xls","xlsx","txt","pps","odt");
$target = "_self";
$no_files = "Sem arquivos pessoais";

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
      echo ' &bull; <a href="http://docs.google.com/viewer?url=http://www.lccv.ufal.br/br.ufal.lccv.sistemas/presal/v0.1.3/panel/controllers/docs-private/file1storage/'.$dir. $file.'&embedded=true" target="'. $target. '">'. $file ."</a><br>\n";
   }
}
?>
</body>
</html>