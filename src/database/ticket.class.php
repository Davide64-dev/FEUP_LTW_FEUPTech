<?php
     declare(strict_types = 1); 

     class Ticket{
        public int $idTicket;
        public string $title;

        public string $description;

        public function __construct(int $idTicket, string $title, string $description){
            
            $this->idTicket = $idTicket;
            $this->title = $title;
            $this->description = $description;
        }
        
        static function addTicket(PDO $db, $title, $description, $user){
            $stmt = $db->prepare(
                "INSERT INTO TICKETS (title, description, status, emailAgent, emailClient, idDepartment)
                VALUES (:title, :description, 'Opened', NULL, :email, NULL)"
            );
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':email', $user->email);
            $stmt->execute();
        }

     }

?>