<?php

namespace App\src\model;

class BlogPost {

    private $id;

    private $title;

    private $post;

    private $author;

    private $datePosted;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getPost() {
        return $this->post;
    }

    public function setPost($post) {
        $this->post = $post;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getdatePosted() {
        return $this->datePosted;
    }

    public function setDatePosted($datePosted) {
        $this->datePosted = $datePosted;
    }
}