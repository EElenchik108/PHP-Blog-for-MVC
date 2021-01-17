<?php

namespace Controllers;
use View\View;
use Models\User;
use Exception\InvalidPropertyException;
use Libs\Mail;

class UserController {		
		
	public function index()
	{
		/*$stringUsers = [
			['name'=> 'Пользователь 1', 'email' => 'Имейл 1'],
			['name'=> 'Пользователь 2', 'email' => 'Имейл 2'],
		];*/

		$stringUsers = User::all();
		
		$title = 'Our users';
		View::render('users/index', compact('stringUsers', 'title'));		
	}	

	public function registration()
	{
		/*Mail::send('EElenchik1@gmail.com' , 'Test!!!!!!!!!!!!!', 'Hello!!!!!!!!!!!!');*/

		if( $_POST ){
			try{
				$user = User::signUp($_POST);
			}	
			catch(InvalidPropertyException $e){
				View::render('users/registration', ['error'=>$e->getMessage()]);
				echo $e->getMessage();
				return;
			}	
			if($user instanceof User){
				$message='=<a href="http://mvc/user/'. $user->getId().'/activate?token='.$user->getAuthToken().'">Activate</a>';
				Mail::sendMail('$user->getEmail()' , 'Активация почтового адреса', $message);
				echo 'Congratulation!';
			}
		}		
		View::render('users/registration', compact('title'));		
	}		

	public function entrance()
	{
		$title = 'Entrance';
		if( $_POST ){
			try{
				$user = User::comeIn($_POST);				
			}	
			catch(InvalidPropertyException $e){
				View::render('users/entrance', ['error'=>$e->getMessage()]);
				echo $e->getMessage();
				return;
			}	
			if($user instanceof User){				
				/*echo 'Вы вошли!';*/				
			}
		}		
		View::render('users/entrance', compact('title'));	
	}	

	public static function output()  {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('Location: /');            
        }            
    }

	public function activate(array $vars)
	{
		$user = User::getById($vars[1]);
		/*print_r($user);*/
		if($user->getAuthToken() == $_GET['token']){		
			$user->setConfirmed(1);
			$user->save();
			echo 'Спасибо за активацию!';
		}
		else {
			echo 'Ошибка активации!';
		}
	}
}
