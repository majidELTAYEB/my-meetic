<?php
    session_start ();
    $mail= $_SESSION['email'];
    $password1 = $_POST['passModif'];
    
    class ModifPass
    {
        public function connectDB()
        {
            try {
                return new PDO('mysql:host=localhost;dbname=bsmymeetic;charset=utf8', 'majid', 'komballe007.');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        
        }
       
       public function Update($hehe,$password)
        {
            $haha = $this->connectDB();
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sqlQuery = "update user set mot_de_passe = '$hashed_password' where email = '$hehe'";
            $haha->query($sqlQuery)->fetch(PDO::FETCH_ASSOC);
            echo "modification prise en compte";
        }
      
    }
    
    $sterling = new ModifPass();
    $sterling ->Update($mail,$password1);