<?php

class Dog {
    private $id;
    private $userId;
    private $age;
    private $dogName;
    private $nickname;
    private $gender;
    private $article;

    public function getDogId() {
        return $this->id;
    }
    public function getDogName() {
        return $this->dogName;
    }

}

?>