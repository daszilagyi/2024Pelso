<?php 
class Pages extends Controller{
    public function __construct(){
       
    }

    public function index(){
        if(isLoggedin()){redirect("posts");}

        $data = [
        'title'=> 'Shareposts',
        'description'=> 'Simple social network built on the TraversyMVC framework'
    ]; 
       
       $this->view('pages/index',$data);
       
    }

    public function about(){
        $data = ['title'=> 'about',
        'description' => 'App to share posz with other users']; 
        $this->view('pages/about',$data);
     }

   
}
