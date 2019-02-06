<?php 

class User {
    private $id;
    private $userName;
    private $userPassword;
    private $latestLogin;

    public function getUserName() {
        return $this->userName;
    }
}

?>