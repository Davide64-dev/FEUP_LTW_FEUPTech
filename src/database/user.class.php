<?php
     declare(strict_types = 1);

     class User{
        public int $id;
        public string $email;
        public string $name;

        public string $last_name;

        public function __construct(int $id, string $email, string $name, string $last_name){
            
            $this->id = $id;
            $this->email = $email;
            $this->name = $name;
            $this->last_name = $last_name;
        }

        function name(){
            return $this->name . ' ' . $this->last_name;
        }



     }







?>