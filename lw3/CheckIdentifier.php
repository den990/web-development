<?php
header("Content-Type: text/plain");
$text = $_GET['identifier'];
$answer = 'Не введён идентификатор';
if ($text === null)
{
	echo $answer;
}
else	
{$
	$text = trim($text);
    if (ctype_alpha($text))
    {
	    $answer = 'Yes';
	    echo 'Так как идентификатор состоит полностью из буквенных символом: ';	  
    }
    else
    {
	    if (is_numeric($text[0]))
	    {
		    $answer = 'No';
		    echo 'Так как идентификатор не может начинатся с цифры:';
	    }
	    else
	    {
		    $answer = 'Yes';
		    echo 'Так как индентификатор начинается с буквы и может содержать цифры:';
	 
  	    }		   
    }
} 
echo $answer;