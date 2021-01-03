<?php

namespace App\src\controller;

use App\src\DAO\BlogPostDAO;
// use App\src\model\View;

class BackController {
    // private $view;

    // public function __construct() {
    //     $this->view = new View();
    // }

    public function addBlogPost($post) {
        if(isset($post['submit'])) {
            $blogPostDAO = new BlogPostDAO();
            $articleDAO->addArticle($post);
            header('Location: ../public_html/index.php');
        }
        return $this->view->render('add_article', [
            'post' => $post
        ]);
    }
}
