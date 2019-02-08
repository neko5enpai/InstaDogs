<?php 

class User {
    private $id;
    private $userName;
    private $userPassword;
    private $latestLogin;


    public function getUserName() {
        return $this->userName;
    }
    
    public function getUserPassword()
    {
        return $this->userPassword;
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}

?>