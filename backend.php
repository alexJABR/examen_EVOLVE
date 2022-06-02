<?php
	require 'app.php';
	$users = new Users();

	switch ($_GET['action']) {
		case 'login':
			login($users->login($_POST));
			break;
		case 'signin':
			signin($users->signin($_POST));
			break;
		case 'logout':
			logout();
			break;
		default:
			break;
	}

	function login($user){
		if (!is_null($user)) {
			$_SESSION['USER_ID'] = $user->user_id;
			$_SESSION['USER_EMAIL'] = $user->email;
			$_SESSION['USER_COLOR'] = $user->color;
		}else{
			//$_SESSION['msg'] = "Error de credenciales";
		}
		header('location: index.php');
	}

	function signin($status){
		if ($status) {
			
		}else{
			$_SESSION['msg'] = "Error de registro";
		}
		header('location: index.php');
	}

	function logout(){
		$_SESSION = null;
		session_destroy();
		header('location: index.php');
	}