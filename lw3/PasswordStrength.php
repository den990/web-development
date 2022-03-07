<?php
header("Content-Type: text/plain");
$password = $_GET['password'];
$length = strlen($password);  // длина пароля
if (!(ctype_alnum($password))) // проверка это буквы или цифры
{
    echo "Не является паролем.";
} 
else 
{
    $safety += 4 * $length;

    for ($i = 0; $i < $length; $i++)          // проверка на цифры
    {
        if (is_numeric($password[$i]))
            $count++;
    }
    $safety += $count * 4;
    $count = 0;

    for ($i = 0; $i < $length; $i++) 
    {
        if (ctype_upper($password[$i]))      // проверка верхнего регистра
            $count++;
    }

    if ($count != 0)
	{	
        $safety += ($length - $count) * 2;
	}
	$count = 0;

    for ($i = 0; $i < $length; $i++)
    {
        if (ctype_lower($password[$i]))            // нижний регистр
            $count++;
    }
    if ($count != 0)
        $safety += ($length - $count) * 2;
    $count = 0;

    if (ctype_alpha($password))
        $safety -= $length;
    if (ctype_digit($password))
        $safety -= $length;

    $result = count_chars($password);

    foreach ($result as $val) 
    {
        if ($val > 1) 
        {
            $safety -= $val;
        }
    }	
    echo 'Уровень надежности пароля: ' . $safety;
}		
?>