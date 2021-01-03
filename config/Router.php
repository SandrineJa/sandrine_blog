<?php
namespace App\config;
use App\src\controller\BackController;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use Exception;

//displays either the home or single blog post page depending on the url 
class Router {

    //contains a FrontController object whenever a new Router object is created
    private $frontController;
    private $backController;
    private $errorController;
    
    public function __construct() {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }
    
    public function run() {
        try {
            //if there's a "blogpost" route in the url, uses the blogPost function from the FrontController object to display a single blog post
            if(isset($_GET['route'])) {
                if($_GET['route'] === 'blogpost') {
                    $this->frontController->blogPost($_GET['id']);
                }
                elseif($_GET['route']==='addBlogPost') {
                    $this->backController->addBlogPost($_POST);
                }
                else {
                    $this->errorController->errorNotFound();
                }
            }
            //if there's no route in the url displays the home page
            else {
                $this->frontController->home();
            }
        }
        catch (Exception $e) {
            echo($e);
            // $this->errorController->errorServer();
        }
    }
}