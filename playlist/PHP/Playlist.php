<?php

class Playlist {
    public $id;
    public $category;
    public $username;
    public $title;
    public $description;
    public $videoLink;
    
    public function __construct($id, $category, $title,$username, $description, $link) {
        $this->id = $id;
        $this->category = $category;
        $this->username = $username;
        $this->title = $title;
        $this->description = $description;
        $this->videoLink = $link;
    }
}
