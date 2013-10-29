<?php
    class Example extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['user']=$this->isUser();
        
        $this->load->view('redireccion');
        $this->load->view('principal',$data);       
    }
}