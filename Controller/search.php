<?php
    
    class search
    {
        public function connectDB1()
        {
            try {
                return new PDO('mysql:host=localhost;dbname=bsmymeetic;charset=utf8', 'majid', 'komballe007.');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        
        }
        
        public function select($genre,$ville,$loisir,$age)
        {
           
                $haha = $this->connectDB1();
                $sqlQuery = "SELECT prenom, nom, birthdate, genre, ville, loisir, email FROM user WHERE user.genre = '$genre' and user.ville like '%$ville%' and user.loisir LIKE '%$loisir%' and birthdate $age;";
                return $haha->query($sqlQuery)->fetchAll();
                
                
            }
    
    
                //return $result;
    
            
            
    }
  