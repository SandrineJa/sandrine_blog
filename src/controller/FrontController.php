<?php
namespace App\src\controller;

use App\src\DAO\BlogPostDAO;


class FrontController {

    //contains a BlogPostDAO object whenever a new FrontController object is created
    private $BlogPostDAO;
    
    public function __construct() {
        $this->BlogPostDAO = new BlogPostDAO;
    }
    
    public function home() {
        $blogPosts = $this->BlogPostDAO->getBlogPosts();
        require '../templates/home.php';
    }

    //uses the BlogPostDAO object's getBlogPost function and the single page template to return and display a blog post
    public function blogPost($id) {
        $blogPost = $this->BlogPostDAO->getBlogPost($id);
        require '../templates/single.php';
    }
}