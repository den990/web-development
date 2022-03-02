<?php
    header("Content-Type: text/plain");
    $info = [
        'first_name' => '',                // инициализация
        'last_name' => '',
        'email' => '',
        'age' => '',
    ];

    foreach ($info as $key => &$value)
        $value = $_GET[$key];

    if (!isset($info['email']))           // если не пусто в email
    {
        echo 'Необходимо ввести ключ email.';
    }
    elseif ($info['email'] === '') 
	{
        echo 'В ключе email не указано значение.';
    }
    else
    {
        $fileName = './data/'.$info['email'].'.txt';
  
        if (file_exists($fileName))     // если файл существует
        {
            $infoFile = file($fileName);
            if (! isset($info['first_name']))
                $info['first_name'] = trim(substr($infoFile[0], strpos($infoFile[0], ':') + 1)); // strpos(где ищем, что ищем), substr(из чего, откуда начинаем(начинается с нуля))
            if (! isset($info['last_name']))
                $info['last_name'] = trim(substr($infoFile[1], strpos($infoFile[1], ':') + 1));
            if (! isset($info['age']))
                $info['age'] = trim(substr($infoFile[3], strpos($infoFile[3], ':') + 1));
        }
  
        $infoStr = '';
        $infoStr = $infoStr . 'First Name: ' . $info['first_name'] . PHP_EOL;  //php_eol перемещение строки
        $infoStr = $infoStr . 'Last Name: ' . $info['last_name'] . PHP_EOL;
        $infoStr = $infoStr . 'Email: ' . $info['email'] . PHP_EOL;
        $infoStr = $infoStr . 'Age: ' . $info['age'];
  
        $successWriting = file_put_contents($fileName, $infoStr, 0);
        if ($successWriting) 
        {
            echo 'Данные записаны в файл ' . $fileName . ' !!!';
        }
        else 
        {
            echo 'Ошибка записи в файл ' . $fileName . ' !!!';
        }
    }