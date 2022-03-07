<?php
header("Content-Type: text/plain");
$text = $_GET['text'];
if ($text === null)
{
    echo 'Введите что нибудь';	
}
$text = trim($text);
while (strpos($text, '  ')) 
{
    $text = str_replace('  ', ' ' , $text); //(что меняем, на что меняем, где меняем)	   
}	  
echo $text;
