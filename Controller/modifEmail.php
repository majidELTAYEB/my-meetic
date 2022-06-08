<?php
    
    session_start ();
    $mail= $_SESSION['email'];
    $email = $_POST['emailModif'];
    
    
    class modifEmail
    {
        public function connectDB()
        {
            try {
                return new PDO('mysql:host=localhost;dbname=bsmymeetic;charset=utf8', 'majid', 'komballe007.');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        
        }
    
        public function Update($adresse,$electro)
        {
            $haha = $this->connectDB();
        
            
            $sqlQuery = "update user set email = '$electro' where email = '$adresse'";
            $haha->query($sqlQuery)->fetch(PDO::FETCH_ASSOC);
            echo "modification prise en compte";
        }
    
    }
    $majid = new modifEmail();
    $majid->update($mail,$email);