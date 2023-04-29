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
        



        static function getUserWithEmail(PDO $db, string $email) : ?User {
            $stmt = $db->prepare('
                SELECT u.email, u.name, u.username
                FROM users u JOIN admins a ON u.email = a.email
                WHERE lower(u.email) = ?');
            $stmt->execute(array(strtolower($email)));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== false) {
                return new Admin($row['email'], $row['name'], $row['username']);
            }
        
            $stmt = $db->prepare('
                SELECT u.email, u.name, u.username
                FROM users u JOIN agents a ON u.email = a.email
                WHERE lower(u.email) = ?');
            $stmt->execute(array(strtolower($email)));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== false) {
                return new Agent($row['email'], $row['name'], $row['username']);
            }
        
            $stmt = $db->prepare('
                SELECT email, name, username
                FROM users
                WHERE lower(email) = ?');
            $stmt->execute(array(strtolower($email)));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== false) {
                return new Client($row['email'], $row['name'], $row['username']);
            }
        
            return null;
        }
        
        
        
        static function addUser(PDO $db, $username, $name, $password, $email){
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

     class Admin extends User{
        
     }

     class Client extends User{
        
    }

    class Agent extends Client{

    }

?>