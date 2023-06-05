<!DOCTYPE html>
<html>
<head>
<title>Тестовое задание 1</title>
<meta charset="utf-8" />
</head>
<body>
<h1>Задание №1</h1>
<?php

function Search ($NameOfArea) {
	// Список районов
	$areas = array (
			1 => '5-й поселок',
			2 => 'Голиковка',
			3 => 'Древлянка',
			4 => 'Заводская',
			5 => 'Зарека',
			6 => 'Ключевая',
			7 => 'Кукковка',
			8 => 'Новый сайнаволок',
			9 => 'Октябрьский',
			10 => 'Первомайский',
			11 => 'Перевалка',
			12 => 'Сулажгора',
			13 => 'Университетский городок',
			14 => 'Центр',
	);
	
	// Близкие районы, связь осуществляется по индентификатору района из массива $areas
	$nearby = array (
			1 => array(2,11),	
			2 => array(12,3,6,8),
			3 => array(11,13),    
			4 => array(10,9,13), 
			5 => array(2,6,7,8),   
			6 => array(10,2,7,8),
			7 => array(2,6,8),	
			8 => array(6,2,7,12),	
			9 => array(10,14),     
			10 => array(9,14,12), 
			11 => array(13,1,9),
			12 => array(1,10),     
			13 => array(11,1,8),	
			14 => array(9,10),     
	);
	
	// список сотрудников
	$workers = array (
			0 => array (
					'login' => 'login1',
					'area_name' => 'Октябрьский', //9
			),
			1 => array (
					'login' => 'login2',
					'area_name' => 'Зарека', //5
			),
			2 => array (
					'login' => 'login3',
					'area_name' => 'Сулажгора', //12
			),
			3 => array (
					'login' => 'login4',
					'area_name' => 'Древлянка', //3
			),
			4 => array (
					'login' => 'login5',
					'area_name' => 'Центр', //14
			),
	);

	//функция, проверяющая наличие сотрудника в массиве workers. результат - строка (login)
	function searchForWorkers ($area, $workers) {
		foreach($workers as $item){
			if ($item['area_name'] == $area) return $item['login']; 
		}
		return null;
	}
	//функция, определяющая ключ района. результат - число
	function searchAreaKey ($area, $areas) {
		foreach($areas as $key => $value) {
			if ($value == $area) return $key;
		}
		return null;
	}
	//функция, определяющая имя района по ключу. результат - строка
	function areaName($num, $areas){
		foreach($areas as $key => $value) {
			if ($num == $key) return $value;
		}
		return null;
	}
	
	//функция, возвращающая список ближайших районов. результат - массив
	function nearbySerch($item, $nearby){
		foreach($nearby as $arr) {
			foreach($arr as $value) {
				if ($value == $item) return $arr;
			}
		}
		return null;
	}
	//функция, проверяющая наличие сотрудника в списке районов
	function workerSearch ($numAreas, $areas, $workers) {
		$namesAreas = [];
		$i = 0;
		foreach ($numAreas as $area) {
			$namesAreas[$i] = areaName($area, $areas);
			$i++;
		}
		
		foreach($namesAreas as $name){
			if (searchForWorkers ($name, $workers) != null) return searchForWorkers ($name, $workers); 
		}
		return null;
	}


	
	$result = searchForWorkers ($NameOfArea, $workers);
	if ($result != null) return $result;
	$keyArea = searchAreaKey($NameOfArea, $areas);
	$N = count($nearby);
	
	for ($i = 0; $i < $N; $i++){
		$ArreyOfAreas = nearbySerch($keyArea, $nearby);//массив ближайших районов
		if ($ArreyOfAreas == null) return null;
		if (workerSearch ($ArreyOfAreas, $areas, $workers) != null) return workerSearch ($ArreyOfAreas, $areas, $workers);
		else unset($nearby[$i]);
	}
	return null;
}



print_r(Search('Голиковка'));


?>
</body>
</html>