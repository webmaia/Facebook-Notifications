<?php
    class Example extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['user']=$this->isUser();
        
        if ($data['user']) {
            $this->load->view('principal',$data); 
        } else {
            $this->load->view('redireccion',$data); 
        }
              
    }
}