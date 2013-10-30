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
            $fecha= Date("Y-m-d"); 

            $estado=$this->nu->user_registro($user['id'], $user['name'], $fecha);

            if($estado)
            {
                //$facebook->setAccessToken($config['appId'].'|'.$config['secret']);
                $mensaje = 'Felicitaciones '.$user['first_name'].' acabas de configurar las notificaciones de la Fundación Girucode';
                $destino = array(
                        'id' => $user['id'],
                    );
                
                enviar_notificacion($mensaje, $destino);
            }

            $data['user']=$user;



            $this->load->view('principal',$data); 

        } else {
            $this->load->view('redireccion',$data); 
        }
              
    }
}