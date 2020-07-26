<?php

namespace application\controllers;

use application\core\Controller;
use application\core\Router;
use application\core\View;

class AdminController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = "admin";
    }

    // Стартовая страница
    public function IndexAction() {
        $this->checkAuth();

        //Logic

        $vars['posts'] = $this->model->getPosts();

        $this->view->render("Панель администратора", $vars);
    }

    // Страница поста
    public function PostAction() {
        $this->checkAuth();

        //Logic
        $parameter = $this->checkParameter();

        $vars['post'] = $this->model->getPost($parameter); 

        $this->view->render($vars['post']['title'], $vars);
    }

    // Страница добавления поста
    public function Add_panelAction() {
        $this->checkAuth();

        //Logic
        $this->view->render("Создание поста");
    }

    public function AddAction() {
        $this->checkAuth();

        //Logic
        if (empty($_POST) || !isset($_POST['title']) || !isset($_POST['content'])) 
            Router::ErrorPage(404);

        $title = $_POST['title'];
        $content = $_POST['content'];

        $id = $this->model->addPost($title, $content);
        $this->view->redirect("http://blog.local/admin/post/$id");
    }

    // Страница изменения поста
    public function Edit_panelAction() {
        $this->checkAuth();

        //Logic
        $parameter = $this->checkParameter();


        $vars['post'] = $this->model->getPost($parameter); 

        $this->view->render("Изменение поста", $vars);
    }

    public function EditAction() {
        $this->checkAuth();

        //Logic
        if (empty($_POST) || !isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['content'])) 
            Router::ErrorPage(404);
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $this->model->editPost($id, $title, $content);
        $this->view->redirect("http://blog.local/admin/post/$id");
    }

    // Страница удаления поста
    public function Delete_panelAction() {
        $this->checkAuth();

        //Logic
        $parameter = $this->checkParameter();


        $vars['post'] = $this->model->getPost($parameter); 

        $this->view->render("Удаление поста", $vars);
    }

    public function DeleteAction() {
        $this->checkAuth();

        //Logic
        if (empty($_POST) || !isset($_POST['id'])) 
            Router::ErrorPage(404);
        $id = $_POST['id'];
        
        $this->model->deletePost($id);
        $this->view->redirect("http://blog.local/admin/");
    }

    // Страница авторизации
    public function LoginAction() {
        if (!empty($_POST) && isset($_POST['login']) && isset($_POST['password'])) 
            $this->model->signin($_POST['login'], $_POST['password']);
        
        if ($this->model->checkAuth()) $this->view->redirect("http://blog.local/admin");

        $this->view->render("Страница авторизации");
    }

    public function LogoutAction() {
        $this->model->signout();
        $this->checkAuth();
    }

    // Shorted
    protected function checkAuth() {
        if (!$this->model->checkAuth())
            $this->view->redirect("http://blog.local/admin/login");
    }

    protected function checkParameter() {
        $parameter = $this->route['parameter'];
        if (!isset($parameter) || preg_match('#\D#', $parameter)) 
            $this->view->redirect("http://blog.local");
        
        return $parameter;
    }

}