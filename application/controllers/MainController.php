<?php

namespace application\controllers;

use application\core\Controller;
use application\core\Router;
use application\core\View;

class MainController extends Controller {

    public function indexAction() {

        $vars['posts'] = $this->model->getCurrentPosts();

        $this->view->render("Главная страница", $vars);

    }

    public function postAction() {
        $parameter = $this->route['parameter'];
        if (!isset($parameter) || preg_match('#\D#', $parameter)) 
            $this->view->redirect("http://blog.local");

        $vars['post'] = $this->model->getPost($parameter); 

        $this->view->render($vars['post']['title'], $vars);
    }

    public function aboutAction() {
        $this->view->render("Информация");
    }

}