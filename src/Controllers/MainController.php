<?php

namespace Controllers;
use View\View;

class MainController{
	public function __construct()
	{
		/*echo __CLASS__ . '<br>';*/
	}
	public function home()
	{
		/*echo __METHOD__ . '<br>';*/
		/*include __DIR__ . '/../templates/header.php'; 
		include __DIR__ . '/../templates/main/home.php'; 
		include __DIR__ . '/../templates/footer.php';*/ 
		/* __DIR__ - полный путь к дирректории, в которой содержится строка*/
		View::render('main/home');
	}
	public function aboutus()
	{	
		/*echo __METHOD__ . '<br>';	*/	
		View::render('main/aboutus');
	}

	public function contacts()
	{
		/*echo __METHOD__ . '<br>';*/
		View::render('main/contacts');
	}

	/*public function page()
	{
		echo __METHOD__ . '<br>';
		View::render('main/page');
	}*/
	public function pdf()
	{
		$posts = \Models\Post::all();
		$mpdf = new \Mpdf\Mpdf();
		foreach ($posts as $post) {
			$mpdf->WriteHTML('<h1>'.$post->getName().'</h1>');
			$mpdf->WriteHTML('<div>'.$post->getText().'</div>');
			$mpdf->WriteHTML('<hr>');

		}		
		$mpdf->Output('blog.pdf', 'D');
	}
	
}