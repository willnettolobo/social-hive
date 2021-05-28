<?php

interface iPostService
{
    public function create($user_id, $description);
    public function update($user_id, $description);
    public function listAll();
    public function quantifyPosts($user_id);
    public function listMyPosts($user_id);
    public function delete($post_id);
}

class PostService implements iPostService 
{
    public function create($description, $user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "INSERT INTO post (description, user_id) VALUES ( '{$description}', '{$user_id}')";
        print $sql;
        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro no banco" . mysqli_errno($connect));
        }
        else
        {
            return true;
        }
    }
    public function update($user_id, $description)
    {   
       
    }
    public function listAll()
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT * from post INNER JOIN user ON user.id = post.user_id";

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro no banco " . mysqli_errno($connect));
        }
        return $query_result;   
    }

    public function quantifyPosts($user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT COUNT(user_id) as quantifyPosts FROM post WHERE user_id = '{$user_id}'";

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result) 
        {
            die("Erro no banco " . mysqli_errno($connect));
        } else {
            return $query_result;
        }
        
    }

    
    public function listMyPosts($user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT *, post.id as post_id from post INNER JOIN user ON user.id = post.user_id AND post.user_id = '{$user_id}'";

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro no banco " . mysqli_errno($connect));
        }
        return $query_result; 
    }

    public function delete($post_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "DELETE FROM post where id = '{$post_id}'";
        
        $query_result = mysqli_query($connect, $sql);
        if(!$query_result) {
            die("Erro na consulta ao banco " . mysqli_errno($connect));
        }
        return true;
    }

    
}
?>