<?php
     declare(strict_types = 1); 

     class User{
        
        public int $id;
        public string $email;
        public string $name;

        public string $username;

        public function __construct(int $id, string $email, string $name, string $username){
            
            $this->id = $id;
            $this->email = $email;
            $this->name = $name;
            $this->username = $username;
        }

        public function getEmail(){
            return $this->email;
        }
        public function getNumberTickets(PDO $db, string $status) : int{
            $stmt = $db->prepare('SELECT count(idClient)
              FROM tickets
              WHERE idClient = ? AND status = ?');
              $stmt->execute(array($this->id, $status));
              $count = $stmt->fetchColumn();
              return intval($count);
        }

        public function getTickets(PDO $db, string $status): array{
            $stmt = $db->prepare('SELECT idTicket, title, description, department, priority FROM tickets WHERE idClient = ? AND status = ?');
            $stmt->execute([$this->id, $status]);
            $ticketRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $tickets = [];
            
            foreach ($ticketRows as $row) {
                $ticket = new Ticket(
                    $row['idTicket'],
                    $row['title'],
                    $row['description'],
                    $row['department'],
                    $row['priority']
                );
                
                array_push($tickets, $ticket);
            }
            
            return $tickets;
        }


        public function getID(){
            return $this->id;
        }
        
        
        static function getUser(PDO $db, String $email, String $password) : ?User {
            $stmt = $db->prepare('
              SELECT idUser, email, name, username
              FROM users
              WHERE lower(email) = ? AND password = ?');
              $stmt->execute(array(strtolower($email), sha1($password)));

            if ($user = $stmt->fetch()){
                return new User(
                $user['idUser'],
                $user['email'],
                $user['name'],
                $user['username'],
                );
            } else return null;
        }
        



        static function getUserWithID(PDO $db, int $id) : ?User {
            $stmt = $db->prepare('
                SELECT u.idUser, u.email, u.name, u.username
                FROM users u JOIN admins a ON u.idUser = a.idAdmin
                WHERE u.idUser = ?');
            $stmt->execute(array($id));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== false) {
                return new Admin($row['idUser'], $row['email'], $row['name'], $row['username']);
            }
        
            $stmt = $db->prepare('
                SELECT u.idUser, u.email, u.name, u.username
                FROM users u JOIN agents a ON u.idUser = a.idAgent
                WHERE u.idUser = ?');
            $stmt->execute(array($id));;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== false) {
                return new Agent($row['idUser'], $row['email'], $row['name'], $row['username']);
            }
        
            $stmt = $db->prepare('
                SELECT idUser, email, name, username
                FROM users
                WHERE idUser = ?');
            $stmt->execute(array($id));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row !== false) {
                return new Client($row['idUser'],$row['email'], $row['name'], $row['username']);
            }
        
            return null;
        }
        
        

        function updateUser(PDO $db, $username, $name, $password, $email){
            $stmt = $db->prepare("
                UPDATE USERS
                SET name = :name, password = :password, email = :newEmail, username = :username
                WHERE email = :oldEmail
            ");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':newEmail', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':oldEmail', $this->email);
            $stmt->execute();
        }
        
        static function addUser(PDO $db, $username, $name, $password, $email){

            $stmt = $db->prepare(
                "INSERT INTO Users (email, name, username, password)
                VALUES (:email, :name, :username, :password)"
            );
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $id = $db->lastInsertId();

          $stmt = $db->prepare(
            "INSERT INTO CLIENTS VALUES ($id)"
          );

          $stmt->execute();
      }
        
     }

     class Admin extends User{
        
     }

     class Client extends User{
        
    }

    class Agent extends Client{

    }

?>