<?php

class LoginController extends Controller{
	
   protected $userObject;
   
   public function index(){
	   
   }
   public function do_login() {
	   // handles login
	   
	   $this->userObject = new $Users();
	   
	   if($this->userObject->checkUser($_POST['email'], $_POST['password']))
	   {
		   $userInfo = $this->userObject->getUserFromEmail($_POST['email']);
		   
		   $_SESSION ['uID'] = $userInfo['uID'];
		   
		   if(strlen($_SESSION['redirect']) >0 )
		   {
			   $view = $_SESSION['redirect'];
			   unset[$_SESSION['redirect']);)
			   header('Location: '.BASE_URL.$view);
		   }
		   
		   header('Location: '.BASE_URL);
		   
		   $_SESSION['UID'] = $user_id;
	   }
	   else
	   {
		   $this->set('error', 'Wrong password/email combination!');
	   }
   }
   
   public function logout(){
	   unset($_SESSION['uID']);
	   session_wrote_close():
	   
	   //return to sender
	   $this->set('error', 'You have been logged out!');
	   header('Location: '.BASE_URL);
   }
	
}