<?php
     declare(strict_types = 1); 

     class Ticket{
        public int $idTicket;
        public string $title;
        public string $status;
        public string $priority;
        public string $description;

        public int $idAgent = -1;
        public string $department;

        public function __construct(int $idTicket, string $title, string $status,
          string $description, string $department, string $priority = "Low"){
            
            $this->idTicket = $idTicket;
            $this->title = $title;
            $this->status = $status;
            $this->description = $description;
            $this->department = $department;
            $this->priority = $priority;
        }

        public function getTitle(){
            return $this->title;
        }
        public function getidAgent(){
            return $this->idAgent;
        }

        public function getStatus(){
            return $this->status;
        }

        public function getDescription(){
            return $this->description;
        }
        
        public function getPriority(){
            return $this->priority;
        }

        public function getDepartment(){
            return $this->department;
        }

        public function changeDepartment($db, $newDepartment){
                $stmt = $db->prepare("
                    UPDATE Tickets
                    SET department = :department
                    WHERE idTicket = :idTicket
                ");
                $stmt->bindParam(':department', $newDepartment);
                $stmt->bindParam(':oldEmail', $this->idTicket);
                $stmt->execute();
        }
        
        function assignTicket(PDO $db, $agent){
            $this->idAgent = $agent->id;
            $stmt = $db->prepare("
                    UPDATE Tickets
                    SET idAgent = :idAgent, status = \"Assigned\"
                    WHERE idTicket = :idTicket
            ");
            $stmt->bindParam(':idAgent', $agent->id);
            $stmt->bindParam(':idTicket', $this->idTicket);
            $stmt->execute();
        }

        function updateStatus(PDO $db, $status){
            $stmt = $db->prepare("
                    UPDATE Tickets
                    SET status = :status
                    WHERE idTicket = :idTicket
            ");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':idTicket', $this->idTicket);
            $stmt->execute();
        }

        static function addTicket(PDO $db, $title, $description, $user, $department ,$priority = "Low"){
            $stmt = $db->prepare(
                "INSERT INTO TICKETS (title, description, status, idAgent, idClient, department, priority)
                VALUES (:title, :description, 'Opened', NULL, :idClient, :department, :priority)"
            );

            $id = $user->getID();
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idClient', $id);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':priority', $priority);
            $stmt->execute();
        }

     }

?>