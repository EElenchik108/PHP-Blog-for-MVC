<?php

namespace Controllers;
use View\View;
use Models\Post;
/*use Libs\Db;*/
use Models\User;


class BlogController {
	private $db;
	public function __construct()
	{
		//$this->db = new Db();
	}
	
	public function index()
	{
		/*$posts = [
			['name'=> 'Статья 1', 'text' => 'Текст статьи 1'],
			['name'=> 'Статья 2', 'text' => 'Текст статьи 2'],
		];*/
		
		/*$posts = $this->db->query('SELECT * FROM posts', [], Post::class);*/
		
		$posts = Post::all();

		$title = 'Blog Page';
		View::render('blog/index', compact('posts', 'title'));
		//View::render('blog/index', ['posts' =>$posts, 'title'=>$title]);
	}
	public function show(array $vars)
	{
		$post = Post::getById($vars[1]);
		//$vars[0] = 'post/1'
		//$vars[1] = '1'
		//$post = $this->db->query('SELECT * FROM posts WHERE id=?', [$vars[1] ], Post::class )[0];  - Post::class возвращает строку с классом и namespace, тоже что и '\Models\Post'
		if(!$post) {
			/*http_response_code('404');*/
			/*View::render('errors/404', [], 404);
			return;*/
			throw new \Exception\PageNotFoundException();	
		}
		$author = Post::getById( $post->getAuthorId() );
		/*echo DB::getInstanceCount();*/

		/*print_r($vars);
		print_r($posts);*/
		/*View::render('blog/show', ['post' =>$post, 'title'=>$title]);  -  или */
		
		View::render('blog/show', compact('post'));
	}
	public function edit(array $vars)
	{
		$id = $vars[1];
		$post = Post::getById($id);
		$users = User::all();
		
		if ( $_POST ) {
			$post->setName($_POST['name']);
			$post->setText($_POST['text']);
			$post->setAuthorId($_POST['author']);
			$post->save();
		}
		View::render('blog/edit', compact('post', 'users'));
		
		/*echo '<pre> '. print_r($post, true) . '</pre>';*/
	}

	public function add()
    {
    	$title = 'Adding a new article';
    	$users = User::all();
    	 /*$post = new Post();
            $post->setName('Новый пост');
			$post->setText('Текст нового поста');
			$post->setAuthorId(1);
			$post->save();*/
        if( $_POST ){
            $post = new Post();
            $post->setName($_POST['name']);
			$post->setText($_POST['text']);
			$post->setAuthorId($_POST['author']);
			$post->setCreatedAt();
			$post->save();
		}        

        View::render('blog/add',  compact('post', 'users'));   
        /*echo '<pre> '. print_r($users, true) . '</pre>';*/

    }

    public function delete(array $vars)
	{
		$id = $vars[1];
		$post = Post::getById($id);		
		$post->delete();	
		header('Location: /blog');
		die();
	}
	public function deleteAjax()
	{
		$post = Post::getById($_POST['id']);		
		$post->delete();
	}
	public function editAjax(array $vars)
	{
		$id = $vars[1];
		$post = Post::getById($id);		
		if ( $_POST ) {
			$post->setName($_POST['name']);			
			$post->save();			
		}
		/*echo '<pre> '. print_r($vars, true) . '</pre>';*/
	}
}

/*ORM - Object Relational Mapping - Объектно-реляционное отображение. Связывает базу данных с концепциями объектно ориентированного языка программирования. Принцип, согласно которому мы работаем с базой данных на уровне объектов. 
Каждой таблице будет соответствовать класс.
posts  -  Post ( с таблицей posts работает класс Post)
свойствами будут названия столбцов в таблице
users  -  users
Когда создаем объект класса new Post, каждый экземпляр класса будет соответствовать строке в таблице*/


/*Singleton - объект Singleton создает один объект класса*/

//AJAX - технология тправки данных js без перезагрузки страницы 