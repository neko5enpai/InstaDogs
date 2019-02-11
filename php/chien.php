<?php

class Dog {
    private $id;
    private $userId;
    private $age;
    private $dogName;
    private $nickname;
    private $gender;
    private $breed;
    private $crossBreeding;
    private $photoURL;

    public function getDogId() {
        return $this->id;
    }
    public function getDogName() {
        return $this->dogName;
    }

    


    /**
     * Get the value of photoURL
     */ 
    public function getPhotoURL()
    {
        return $this->photoURL;
    }
}

?>