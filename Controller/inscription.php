<?php
    
    class inscription
    {
        public $lastname;
        public $firstname;
        public $birthdate;
        public $genre;
        public $city;
        public $email;
        public $password;
        public $loisir;
        
       public function connectDB(){
           try
           {
               return new PDO('mysql:host=localhost;dbname=bsmymeetic;charset=utf8', 'majid', 'komballe007.');
           }
           catch(Exception $e)
           {
               die('Erreur : '.$e->getMessage());
           }
    
       }
        
       public function getinfo(){
            $mysqlclient = $this->connectDB();
            $this ->firstname = $_POST['firstname'];
            $this ->lastname = $_POST['lastname'];
            $this ->birthdate = $_POST['birthdate'];
            $this ->genre = $_POST['genre'];
            $this ->city = $_POST['ville'];
            $this ->email = $_POST['email'];
            $this ->password = $_POST['password'];
            $this ->loisir = implode(',', $_POST['loisir']);
           $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
           $sqlQuery = "insert into user (nom ,prenom, birthdate, genre, ville,loisir, email, mot_de_passe)
                        values ('$this->lastname','$this->firstname','$this->birthdate','$this->genre','$this->city','$this->loisir','$this->email','$hashed_password');";
           
           $allusers = $mysqlclient->query($sqlQuery);
           $users = $allusers->fetchAll();
    
       }
    }
    $majid = new inscription();
    $majid ->getinfo();