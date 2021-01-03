<?php

//Pour toutes les classes dans DAO
namespace App\src\DAO;

use App\src\model\BlogPost;

class BlogPostDAO extends DAO {

    private function createBlogPost($row) {
        $blogPost = new BlogPost();
        $blogPost->setId($row['id']);
        $blogPost->setTitle($row['title']);
        $blogPost->setPost($row['post']);
        $blogPost->setAuthor($row['author']);
        $blogPost->setDatePosted($row['datePosted']);
        return $blogPost;
    }

    
    // public function getBlogPosts() {
    //     $query = 'SELECT * FROM blog_posts ORDER BY id DESC';
    //     return $this->createQuery($query);
    // }

    public function getBlogPosts() {
        $query = 'SELECT * FROM blog_posts ORDER BY id DESC';
        $result = $this->createQuery($query);
        $blogPosts = [];
        foreach ($result as $row) {
            $blogPostId = $row['id'];
            $blogPosts[$blogPostId] = $this->createBlogPost($row);
        }
        $result->closeCursor();
        return $blogPosts;
    }

    //returns a single blog post depending on the id taken in parameter, the createQuery function tests the query first to avoid sql injections
    public function getBlogPost($id) {
        $query = 'SELECT * FROM blog_posts WHERE id = ?';
        $result = $this->createQuery($query, [$id]);
        $blogPost = $result->fetch();
        $result->closeCursor();
        return $this->createBlogPost($blogPost);
    }
}