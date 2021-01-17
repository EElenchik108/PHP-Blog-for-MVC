<?php
/*try{
	throw new Exception('Сообщение об ошибке'); //- пишем код, который может сгенеритовать ошибку
}

catch(Exception $e) {
	echo 'Поймали ' . $e->getMessage(); //- обрабатываем ошибку
}*/
f1();
function f1() {
	try{
		f2();
	}
	catch(Exception $e) {
	echo 'Поймали ' . $e->getMessage();
}
}

function f1(){
	$a = 5;
	$b = 0;
	if($b == 0)	throw new Exception('На ноль делить нельзя');
		echo $a / $b;
	
}