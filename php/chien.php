<?php

class Dog {
    private $id;
    private $userId;
    private $age;
    private $dogName;
    private $nickname;
    private $gender;
    private $article;
    private $photoURL;
    private $breed;
    private $crossBreeding;

    public function getDogId() {
        return $this->id;
    }
    public function getDogName() {
        return $this->dogName;
    }

    public function getPhotoURL() {
        return $this->photoURL;
    }

}

?>