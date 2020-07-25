<?php

namespace application\models;

use application\core\Model;
use application\core\Router;

class AdminModel extends Model {

    // Auth

    public function checkAuth() {
        return true;
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