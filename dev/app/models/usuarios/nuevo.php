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
		function user_registro($id,$nombre,$apellido,$email)
		{
			//realizando verificacion usuario y el secrectKey
			$this->db->where('usuario',$usuario);
			$this->db->or_where('secretKey',$secretKey);
			//realizando la consulta de verificaion
			$userV=$this->db->get('usuarios')->result_array();
			//paso 1 de verificacion
			if(empty($userV)){
				//realizando verificacion del email
				$this->db->where('email',$email);
				//realizando la consulta de verifiacion
				$emailV=$this->db->get('personas')->result_array();

				//paso 2 de la verificacion
				if(empty($emailV)){
					//creando la persona en la BD
					$data = array(
					 'nombre' => $nombre,
					 'apellido' => $apellido,
					 'idPais' => $pais,
					 'email'=>$email,
					 'genero' => $gender,
					);
					$r1=$this->db->insert('personas', $data); 
					
					$this->db->where('email',$email);
					$this->db->limit(1);
					$userT=$this->db->get('personas')->result_array();
					$userN=$userT[0];

					//creando el usuario en la BD
					$data = array(
					 'usuario' => $usuario,
					 'contrasenia' => $pwd,
					 'idPersona'=>$userN['id'],
					 'secretKey' => $secretKey,
					);
					$r2=$this->db->insert('usuarios', $data);

					//sacando el id asignado al usuario
					$this->db->where('email',$email);
					$this->db->select('id');
					$idA=$this->db->get('personas')->result_array();

					//asignando puntos al usuarios en la BD
					$data=array(
						'idPersona'=> $idA[0]['id'],
					);

					$this->db->insert('puntos',$data);
				}
				else
				{
					return 2;
				}
			}
			else
			{
				return 1;
			}
			
			
		}
	}