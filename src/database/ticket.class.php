<?php
     declare(strict_types = 1); 

     class Ticket{
        public int $idTicket;
        public string $title;
        
        public string $priority;
        public string $description;

        public function __construct(int $idTicket, string $title, string $description, string $priority = "Low"){
            
            $this->idTicket = $idTicket;
            $this->title = $title;
            $this->description = $description;
            $this->priority = $priority;
        }
        
        static function addTicket(PDO $db, $title, $description, $user, $priority = "Low"){
            $stmt = $db->prepare(
                "INSERT INTO TICKETS (title, description, status, idAgent, idClient, idDepartment, priority)
                VALUES (:title, :description, 'Opened', NULL, :idClient, NULL, :priority)"
            );

            $id = $user->getID();
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idClient', $id);
            $stmt->bindParam(':priority', $priority);
            $stmt->execute();
        }

     }

?>