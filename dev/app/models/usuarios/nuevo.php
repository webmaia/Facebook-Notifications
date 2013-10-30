<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Clase Nuevo_usuario
	 * Descripcion: Clase para agregar un usuario a la base de datos
	 * Autor: Angel Kurten
	 * link http://angelkurten.com
	 */
	class Nuevo_usuario extends CI_Model {
		//constructor de la clase
		function __construct()
		{
			parent::__construct();
		}

		//metodo para agregar un usuario
		function user_registro($id,$username,$fechaAlta)
		{
			//realizando verificacion usuario 
			$this->db->where('id',$id);
			//realizando la consulta de verificaion
			$userV=$this->db->get('usuarios')->result_array();
			//paso 1 de verificacion
			if(empty($userV)){

				$data = array(
				 'id' => $id,
				 'username' => $username,
				 'fechaAlta' => $fechaAlta
				);

				return $this->db->insert('usuarios', $data); 
			}
			else
			{
				return false;
			}
		}
	}