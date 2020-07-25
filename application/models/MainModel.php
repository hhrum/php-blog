<?php

namespace application\models;

use application\core\Model;
use application\core\Router;

class MainModel extends Model {
    
    public function getCurrentPosts() {

        $posts = $this->db->selectSort("post", "date", 3);

        return $posts;
    }

    public function getPost($id) {
        $post = $this->db->findOne("post", "id", $id);
        
        if (isset($post))
            return $post->export();
        else
            Router::ErrorPage(404);
    }

}
