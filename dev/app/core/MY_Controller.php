<?php
	class MY_Controller extends CI_Controller {
		//constructor de la clase
		function __construct()
		{
			parent::__construct();
		}
		
		public function isUser()
		{
			$user = $this->facebook->getUser();
	        
	        if ($user) {
	            try {
	                return  $this->facebook->api('/me');
	            } catch (FacebookApiException $e) {
	                return false;
	            }
	        }
		}

		/*public function isPerm($perm){
			$c=$this->isLogged();
			if($perm=='private'){
				if($c==FALSE){
					redirect('usuario/login', 'refresh');
				}
			}
			elseif ($perm=='warning') {
				if($c==TRUE){
					redirect('usuario/perfil','refresh');
				}
			}
		}*/
	}

