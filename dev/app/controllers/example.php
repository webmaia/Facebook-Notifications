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

            $this->load->model('usuarios/nuevo','nu');

            date_default_timezone_set('America/Bogota');
            $fecha= Date("d/m/Y"); 
                        
            echo $this->nu->user_registro($user['id'], $user['username'], $fecha);

            $data['user']=$user;

            $this->load->view('principal',$data); 

        } else {
            $this->load->view('redireccion',$data); 
        }
              
    }
}