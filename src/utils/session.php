<?php 

class Session{
    private array $messages;
    public function __construct() {
        session_start();
        $this->messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
        unset($_SESSION['messages']);
      }
    
      public function isLoggedIn() : bool {
        return isset($_SESSION['email']);    
      }

      public function logout() {
        session_destroy();
      }
  
      public function getEmail() : ?string {
        return isset($_SESSION['email']) ? $_SESSION['email'] : null;    
      }

      public function setEmail(String $email){
        $_SESSION['email'] = $email;
      }

      public function setName(String $name){
        $_SESSION['name'] = $name;
      }
      
      public function addMessage(string $type, string $text) {
        $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
      }
}
?>