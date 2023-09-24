<?php

	class Connection extends PDO{
		private $NameHost = 'localhost';
		private $NameBD = 'articulos';
		private $userDB = 'root';
		private $PasswordBD = '';

		public function __construct(){
			try{
                //echo "Bien";
				return parent::__construct('mysql:host=' . $this->NameHost . ';dbname=' . $this->NameBD . ';charset=utf8', $this->userDB, $this->PasswordBD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}catch(PDOException $e){
				die("Error: " . $e->getMessagge());
				echo "Linea de error: " . $e->getLine();
				exit;
			}
		}

		
	}
	
    //$obj = new Connection();
    
?>
