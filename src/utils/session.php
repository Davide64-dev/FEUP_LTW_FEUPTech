<?php 

class Session{

    public function __construct() {
        session_start();
      }
    
      public function isLoggedIn() : bool {
        return isset($_SESSION['email']);    
      }

      public function logout() {
        session_destroy();
      }
  
      public function getEmail() : ?int {
        return isset($_SESSION['email']) ? $_SESSION['email'] : null;    
      }
  


}


?>