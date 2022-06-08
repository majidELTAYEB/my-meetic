<?php
    session_start();
    if ($_SESSION) {
        
        require_once("connexion.php");
        require_once("info.php");
        $mail = $_SESSION['email'];
    
        class affichage
        {
            public $email;
            public $mysqlclient2;
        
            function __construct($email)
            {
                $this->email = $email;
            }
        
            public function callConnect()
            {
                return (new connexion())->connectDB();
            
            }
        
            public function select()
            {
                $this->mysqlclient2 = $this->callConnect();
                $sqlQuery = "select nom, prenom, birthdate, genre, ville, email from user where email = '$this->email';";
            
                return $this->mysqlclient2->query($sqlQuery)->fetch(PDO::FETCH_ASSOC);
            }
        
            public function showInfo()
            {
                $info = $this->select();
                return $info;
            
            }
        
        }
    
        $omar = new affichage($mail);
    }else{
        header("Location:../view/connexion.html");
    }
    
    
    