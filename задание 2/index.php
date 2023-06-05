<!DOCTYPE html>
<html>
<head>
<title>Тестовое задание 2</title>
<meta charset="utf-8" />
</head>
<body>
<h1>Задание №2</h1>
<?php

//функция провкрки интервала на корректность
function timePeriodCheck ($timePeriod) {
	if (strlen($timePeriod) != 11) return false;
	if ($timePeriod[2] != ':' || $timePeriod[5] != '-' || $timePeriod[8] != ':') return false;
	$hStart = (int)substr($timePeriod, 0, 2);
	$mStart = (int)substr($timePeriod, 3, 2);
	$hEnd = (int)substr($timePeriod, 6, 2);
	$mEnd = (int)substr($timePeriod, 9, 2);
	if ($hStart > 23 || $mStart > 59 || $hEnd > 23 || $mEnd > 59 || $hStart < 0 || $mStart < 0 || $hEnd < 0 || $mEnd < 0) return false;
	return true;
}

//функция проверки наложения интервалов
function crossInterval ($timePeriod) {
	//функции перевода временного интервала из исходного формата в минуты
	function toMinStart ($timePeriod) {
		$hStart = (int)substr($timePeriod, 0, 2);
		$mStart = (int)substr($timePeriod, 3, 2);
		return $hStart * 60 + $mStart;
	}
	function toMinEnd ($timePeriod) {
		$hEnd = (int)substr($timePeriod, 6, 2);
		$mEnd = (int)substr($timePeriod, 9, 2);
		return $hEnd * 60 + $mEnd;
	}
	
	$list = array (
		'09:00-11:00',
		'11:00-13:00',
		'15:00-16:00',
		'17:00-20:00',
		'20:30-21:30',
		'21:30-22:30',
	);
	
	$hStart = (int)substr($timePeriod, 0, 2);
	$mStart = (int)substr($timePeriod, 3, 2);
	$hEnd = (int)substr($timePeriod, 6, 2);
	$mEnd = (int)substr($timePeriod, 9, 2);
	
	foreach ($list as $time) {
		if (toMinStart($timePeriod) < toMinEnd($time) && toMinEnd($timePeriod) > toMinStart($time)) return false;
	}
	return true;
}

if (!crossInterval ('14:00-16:00')) print_r('произошло наложение!');
else print_r('наложения нет!');

?>
</body>
</html>