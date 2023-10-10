<?php

class Post{
private $db;

public function __construct(){
    $this->db = new Database;
}
public function getPosts(){
    $this->db->query('select *,
                posts.id as postId,
                users.id as userId,
                posts.created_at as post_created,
                users.created_at as users_created
                from posts
                inner join users on posts.user_id = users.id order by posts.created_at DESC');
    $results = $this->db->resultSet();
    return $results;
}

}

