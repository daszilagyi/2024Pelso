<?php
 class Users extends Controller{
    public function __construct(){
            $this->userModel = $this->model('User');
    }
    public function register(){
        //check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize Post data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' =>"",
                'email_err' =>"",
                'password_err' =>"",
                'confirm_password_err' =>""
            ]; 
            //Validate Email
            if(empty($data['email'])){$data['email_err'] ="Please enter your email";}else{
                //check email exist
                if($this->userModel->findUserByEmail($data['email'])){$data['email_err'] ="Email is alredy taken";}
            }
            if(empty($data['name'])){$data['name_err'] ="Please enter your name";}
            if(empty($data['password'])){$data['password_err'] ="Please enter your password";}elseif(
            strlen($data['password'])<6){$data['password_err'] = "password must be 6 characters";}
            if(empty($data['confirm_password'])){$data['confirm_password_err'] ="Please confirm password";}else{
            if($data['password'] != $data['confirm_password']){$data['confirm_password_err']="Passwords do not match";}}

            //make sure errors are empty 
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ){
              // HASH Password
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
              // register User
              if($this->userModel->register($data)){
                flash("register_success","You are registered and can login");
                redirect('users/login');
              }else{die("User registration failed");}

            }else{
                //LOAD VIEW with errors
                $this->view('users/register', $data);
            }


        }else{
            //init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' =>"",
                'email_err' =>"",
                'password_err' =>"",
                'confirm_password_err' =>""
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }
    public function login(){
        //check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
            // Init data
            $data =[
              'email' => trim($_POST['email']),
              'password' => trim($_POST['password']),
              'email_err' => '',
              'password_err' => '',      
            ];
    
            // Validate Email
            if(empty($data['email'])){
              $data['email_err'] = 'Please enter email';
            }
    
            // Validate Password
            if(empty($data['password'])){
              $data['password_err'] = 'Please enter password';
            }

            if($this->userModel->findUserByEmail($data['email'])){
              //user found
            }else{
              $data['email_err'] = "No User found";
            }

    
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
              // Validated
              //check and set logged in user
              $loggedInUser=$this->userModel->login($data['email'],$data['password']) ;
              if($loggedInUser){
                  //create session
                  $this->createUserSession($loggedInUser);
              }else{
                $data['password_err'] = 'Password incorrect';
                $this->view('users/login', $data);
              }


            } else {
              // Load view with errors
              $this->view('users/login', $data);
            }
    
        }else{
            $data =[    
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',        
              ];
      
              // Load view
              $this->view('users/login', $data);
        }
    }
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('posts/index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

 /*   public function isLoggedin(){
      if(isset($_SESSION['user_id'])){return true;}else{return false;}
    }
*/
 }