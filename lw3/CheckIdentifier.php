<?php
  header("Content-Type: text/plain");
  
  $text = trim($_GET['identifier']);
  $long = str_split($text); // из строки в массив
  $answer = 'Не введён идентификатор';
  if ($text = trim($_GET['identifier']))
  {	  
      if (ctype_alpha($text))
      {
          $answer = 'Yes';
          echo 'Так как идентификатор состоит полностью из буквенных символом: ';	  
      }
      else
      {
	      if (is_numeric($long[0]))
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