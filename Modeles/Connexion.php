<?php
	
	class Connexion{
        private $port=3306;
		private $host="localhost";
		private $user="root";
		private $password="";
		private $dbname="pfe";
		
		public static function getPDO()
        {		
             $conn = new PDO("mysql:host=localhost;dbname=pfe",'root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
             //echo "connection avec succes";	
			return $conn;
        }
	}

	  try{$c = new Connexion();

  
}catch(PDOException $e){
	echo $e -> getMessage();
}
?>