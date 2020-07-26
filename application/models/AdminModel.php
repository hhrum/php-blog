<?php

namespace application\models;

use application\core\Model;
use application\core\Router;

class AdminModel extends Model {

    // Auth

    public function signup($login, $password) {

        if ( $this->db->findOne("user", "login", $login) ) Router::ErrorPage(404);

        $rows = [
            "login" => $login,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        $id = $this->db->insert("user", $rows);
        
        if ($id) return $id;
        Router::ErrorPage(404);
    }

    public function signin($login, $password) {
        $user = $this->db->findOne("user", "login", $login)->export();
        if (!$user || !password_verify($password, $user['password'])) return;
        $auth_check = password_hash(random_bytes(5), PASSWORD_DEFAULT);

        $user['auth_check'] = $auth_check;
        $this->db->update("user", $user['id'], $user);
        $_SESSION['auth_id'] = $user['id'];
        $_SESSION['auth_check'] = $auth_check;
    }

    public function signout() {
        unset($_SESSION['auth_check']);
        unset($_SESSION['auth_id']);
    }

    public function checkAuth() {
        if (isset($_SESSION['auth_check']) && isset($_SESSION['auth_id'])) {
            $user = $this->db->findOne("user", "id", $_SESSION['auth_id']);
            if($user) 
                return $user['auth_check'] == $_SESSION['auth_check'];
        } 
        return false;
    }

    // Post

    public function getPosts() {
        return $this->db->select('post', 1);
    }

    public function getPost($id) {
        $post = $this->db->findOne("post", "id", $id);
        
        if (isset($post))
            return $post->export();
        else
            Router::ErrorPage(404);
    }

    public function addPost($title, $content) {
        $content = preg_replace("/\r\n|\r|\n/", '<br>', $content);;

        $post = [
            "title" => $title,
            "content" => $content,
            "date" => date('Y-m-d H:i:s'),
        ];

        return $this->db->insert("post", $post);
    }

    public function editPost($id, $title, $content) {
        $post = [
            "title" => $title,
            "content" => $content,
        ];

        $this->db->update("post", $id, $post);

    }

    public function deletePost($id) {
        $this->db->delete("post", $id);
    }

}