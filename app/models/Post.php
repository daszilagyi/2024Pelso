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

public function addPost($data){
    $this->db->query('INSERT INTO posts (title,user_id,body) values(:title,:user_id,:body)');
    //bind values
    $this->db->bind(':title',$data['title']);
    $this->db->bind(':user_id',$data['user_id']);
    $this->db->bind(':body',$data['body']);

    //execute
    if($this->db->execute()) {return true;}else{return false;}
}

public function getPostById($id){
    $this->db->query('Select * from posts where id = :id');
    $this->db->bind(':id',$id);
    $row = $this->db->single();
    return $row;


}

}

