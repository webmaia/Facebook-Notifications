<?php
    class Example extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $user=$this->isUser();
        
        if ($user){

            //$this->load->model('usuarios/nuevo','nu');

            $fecha= Date("d/m/Y");

            //$this->nu->user_registro($user['id'], $user['username'], $fecha);

            $data['user']=$user;

            $this->load->view('principal',$data); 

        } else {
            $this->load->view('redireccion',$data); 
        }
              
    }
}