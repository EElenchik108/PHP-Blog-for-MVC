<?php

namespace View;

class View {
	
	public static function render(string $path, array $vars=[], int $code = 200)
	{
		http_response_code($code);
		extract($vars);	//$post, $title - по названию ключей в массиве создает переменные
		unset($vars);

		ob_start(); //- начинает записывать в буфер
		include __DIR__ . '/../templates/header.php'; 
		include __DIR__ . '/../templates/'.$path .'.php'; 
		include __DIR__ . '/../templates/footer.php';
		$buffer = ob_get_contents(); //- будет содержаться все, что мы запомнили
		ob_end_clean(); //- буферизация закончилась

		echo $buffer;
	}
}