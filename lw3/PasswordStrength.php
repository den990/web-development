<?php
    header("Content-Type: text/plain");
	
    $text = trim($_GET['password']);
    $countNum = $countChar = $countUpReg = $countDownReg = 0;   

    $len = iconv_strlen($text);  // кол-во символов в тексте с нужной кодировкой
    $arrFromText = str_split($text);   // в массив

    foreach($arrFromText as $newArrText)        // В переменной $newArrText будет лежать элемент массива каждый раз разный: сначала первый, потом второй...
    {
        if(is_numeric($newArrText)) 
        {
            $countNum++;  // цифры
        }
        else 
        {
            $countChar++; // буквы

            if(ctype_upper($newArrText)) 
            {
                $countUpReg++; // верхний регистр
            }
            else 
            {
                $countDownReg++; // нижний регистр
            }
        }
    }

    foreach(count_chars($text, 1) as $i => $value)               //count_chars(сколько раз какая буква встречается)
    {
        if($value > 1) 
        {
            $countReplay += $value;                   // countReplay=countReplay + value
        }
    }

    echo 'Уровень надежности пароля: ' . getSafetyLevel($len, $countNum, $countChar, $countUpReg, $countDownReg, $countReplay);

    function getSafetyLevel($len, $countNum, $countChar, $countUpReg, $countDownReg, $countReplay): ?int
    {
        if($len != 0)   
        {
            $safety += 4 * $len;

            if($countChar != 0)
            {
                if($countNum != 0)
                {
                    $safety += 4 * $countNum;
                }
                else
                {
                    $safety -= $len;           // safety=safety-len
                }

                if($countDownReg != 0)
                {
                    $safety += ($len - $countDownReg) * 2;
                }

                if($countUpReg != 0)
                {
                    $safety += ($len - $countUpReg) * 2;
                }
            }
            else
            {
                $safety += 4 * $countNum;
                $safety -= $len;
            }

            if($countReplay != 0)
            {
                $safety -= $countReplay;
            }

            return $safety;

        } 
        else
        {
            return 0;
        }
    }
