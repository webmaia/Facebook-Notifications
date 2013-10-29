<?php
    class Example extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook
                    ->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook
                ->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook
                ->getLoginUrl();
        }

        $this->load->view('view',$data);
    }
}