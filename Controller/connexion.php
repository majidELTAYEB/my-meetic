<?php
    
    class connexion
    {
        public function connectDB()
        {
            try {
                return new PDO('mysql:host=localhost;dbname=bsmymeetic;charset=utf8', 'majid', 'komballe007.');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        
        }
    
        public function verification()
        {
                $mysqlclient1 = $this->connectDB();
                $email = ($_POST['emailLog']);
                $password = ($_POST['passwordLog']);
                if(!isset($email, $password)){
                    return false;
                }
    
            $sqlQuery = "select * from user where email = '$email';";
    
            return $mysqlclient1->query($sqlQuery)->fetch(PDO::FETCH_ASSOC);
        }
        
        
        
        public function connection()
        {
            
            $users = $this->verification();
           $reponse = null;
            if(is_array($users)) {
                if (password_verify($_POST['passwordLog'], $users['mot_de_passe'])) {
                    
                    session_start ();
                    $_SESSION['email'] = $_POST['emailLog'];
                    $_SESSION['password'] = $_POST['passwordLog'];
                    
                    return true;
                }else {
                    echo "wrong password";
                    exit();
                    
                }
            }else {
                
                echo "account doesn't exist";
                exit();
                
            }
        }
        }
    
    
    