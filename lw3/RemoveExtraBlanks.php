<?php
  header("Content-Type: text/plain");

  $text = trim($_GET['text']);
  while (strpos($text, '  ') != false)
{
     $text = str_replace('  ', ' ' , $text); //(что меняем, на что меняем, где меняем)	   
}	  
echo $text;
