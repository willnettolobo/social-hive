<?php

interface iUserService {
    public function signin($username, $password);
    public function signout();
    public function create($username, $password);
    public function update($name, $email, $gender, $user_id);
    public function searchUser($username = null, $name = null);
    public function listUserById($user_id);
    public function maxSeguidor($user_id);
    public function maxSeguindo($user_id);
    public function listSeguidor($user_id);
    public function listSeguindo($user_id);
    public function addSeguidor($user_id_seguindo, $user_id_seguidor);
   
}

class UserService implements iUserService{
    public function signin($username, $password)
    {
        require_once "../../db.mysql/database.php";
        
        $connect = connect();
        $sql = "SELECT * from user WHERE username = '{$username}' and password = '{$password}'";
        $query_result = mysqli_query($connect, $sql);

        if (!$query_result) {
            die("Falha na consulta do banco");
        }

        $row = mysqli_fetch_assoc($query_result);

        if (empty($row)) {
            return false;
        } else {
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            return true;
        }
    }
    public function signout()
    {
        require_once "../../db.mysql/database.php";

        session_unset();
        session_destroy();

        header("location:../pages/login.php");
    }


    public function create($username, $password)
    {
        require_once "../../db.mysql/database.php";
        
        $connect = connect();
        $sql = "INSERT INTO user (username, password) VALUES ( '{$username}', '{$password}')";
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

    public function update($name, $email, $gender, $user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "UPDATE user SET name = '{$name}', email = '{$email}', gender = '{$gender}' WHERE id = '{$user_id}'";
        
        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco." . mysqli_errno($connect));
        } 
        else 
        {
            return true;
        }
    }

    public function searchUser($username = null, $name = null)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT * FROM user WHERE username LIKE '$username%'";
        

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco" . mysqli_errno($connect));
        }
        else
        {
            return $query_result;
        }
    }


    public function listUserById($user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT * FROM user WHERE id = '{$user_id}'";

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco." . mysqli_errno($connect));
        } 
        else 
        {
            return $query_result;
        }
    }

    public function maxSeguidor($user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT COUNT(seguidor) as followers FROM usersocial WHERE seguindo = '{$user_id}'";

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco." . mysqli_errno($connect));
        } 
        else 
        {
            return $query_result;
        }
    }

    public function maxSeguindo($user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT COUNT(seguidor) as followings FROM usersocial WHERE seguidor = '{$user_id}'";

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco." . mysqli_errno($connect));
        } 
        else 
        {
            return $query_result;
        }
    }

    public function listSeguidor($user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT user.username as follows FROM usersocial
        INNER JOIN user ON user.id = usersocial.seguidor AND usersocial.seguindo = '{$user_id}'";
    
        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco." . mysqli_errno($connect));
        } 
        else 
        {
            return $query_result;
        }
    }

    public function listSeguindo($user_id)
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "SELECT user.username as followings FROM usersocial
        INNER JOIN user ON user.id = usersocial.seguindo AND usersocial.seguidor = '{$user_id}'";

        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco." . mysqli_errno($connect));
        } 
        else 
        {
            return $query_result;
        }
    }

    public function addSeguidor($user_id_seguidor, $user_id_seguindo )
    {
        require_once "../../db.mysql/database.php";

        $connect = connect();
        $sql = "INSERT INTO usersocial (seguidor,seguindo) VALUES ($user_id_seguidor, $user_id_seguindo)";
        
        $query_result = mysqli_query($connect, $sql);
        if(!$query_result)
        {
            die("Erro na consulta do banco." . mysqli_errno($connect));
        } 
        else 
        {
            return true;
        }
    }
   
}


?>