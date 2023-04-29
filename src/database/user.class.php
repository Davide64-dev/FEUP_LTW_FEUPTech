<?php
     declare(strict_types = 1);

     class User{

        public string $email;
        public string $name;

        public string $username;
        public string $last_name;

        public function __construct(string $email, string $name, string $username){
            
            $this->email = $email;
            $this->name = $name;
            $this->username = $username;
        }

        function name(){
            return $this->name . ' ' . $this->last_name;
        }
        
        
        static function getUser(PDO $db, String $email, String $password) : ?User {
            $stmt = $db->prepare('
              SELECT email, name, username
              FROM users
              WHERE lower(email) = ? AND password = ?');
              $stmt->execute(array(strtolower($email), $password));

            if ($user = $stmt->fetch()){
                return new User(
                $user['email'],
                $user['name'],
                $user['username'],
                );
            } else return null;
        }
        
        
        public static function addUser(PDO $db, $username, $name, $password, $email){
          $stmt = $db->prepare(
              "INSERT INTO USERS VALUES (\"$email\", \"$name\", \"$username\", \"$password\")"
          );
          $stmt->execute();
      
          // assuming the 'clients' table has a foreign key constraint linking it to the 'users' table
          /*
          $clientId = $db->lastInsertId();
          $stmt = $db->prepare(
              "INSERT INTO CLIENTS (email) VALUES (email)"
          );
          $stmt->execute();
          */
      }
        
     }


?>