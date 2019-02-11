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

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the value of nickname
     */ 
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get the value of breed
     */ 
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Get the value of crossBreeding
     */ 
    public function getCrossBreeding()
    {
        return $this->crossBreeding;
    }
}

?>