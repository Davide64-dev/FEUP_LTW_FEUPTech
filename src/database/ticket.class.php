<?php
     declare(strict_types = 1); 

     class Ticket{
        public int $idTicket;
        public string $title;
        public string $status;
        public string $priority;
        public string $description;

        public int $idAgent;
        public string $department;
        public string $date;

        public function __construct(int $idTicket, string $title, string $status,
          string $description, string $department, string $priority, string $date){
            
            $this->idTicket = $idTicket;
            $this->title = $title;
            $this->status = $status;
            $this->description = $description;
            $this->department = $department;
            $this->priority = $priority;
            $this->date = $date;
        }

        public function getStatus(){
            return $this->status;
        }


        public function getDepartment(){
            return $this->department;
        }
        public function getTitle(){
            return $this->title;
        }

        public function getPriority(){
            return $this->priority;
        }

        public function getInquiries($db){
            
            $stmt = $db->prepare("Select * from inquiries where idTicket = ?");

            $stmt->execute([$this->idTicket]);

            $inquiriesRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $inquiries = [];

            foreach ($inquiriesRows as $row) {
                $inquirie = new Inquirie(
                    $row['idInquirie'],
                    $row['content'],
                    $row['date'],
                    $row['idUser'],
                    $row['idTicket'],
                );
                
                array_push($inquiries, $inquirie);
            }

            return $inquiries;


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
                "INSERT INTO TICKETS (title, description, status, idAgent, idClient, department, priority, date)
                VALUES (:title, :description, 'Opened', NULL, :idClient, :department, :priority, :date)"
            );
            
            $currentDate = date('Y-m-d');

            $id = $user->getID();
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idClient', $id);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':priority', $priority);
            $stmt->bindParam(':date', $currentDate);
            $stmt->execute();
        }

     

     public static function addInquirie(PDO $db, $inquirie){
        
        $stmt = $db->prepare(
            "INSERT INTO INQUIRIES (content, date, idUser, idTicket)
            VALUES (:content, :date, :idUser, :idTicket)"
        );

        $stmt->bindParam(':content', $inquirie->content);
        $stmt->bindParam(':date', $inquirie->date);
        $stmt->bindParam(':idUser', $inquirie->idUser);
        $stmt->bindParam(':idTicket', $inquirie->idTicket);
        $stmt->execute();
     }
    }

?>