<?php


class User
{
    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    private function findUser(string $username)  {
        $this->db->query('select * from users where (username = :username) or (email = :username)');

        $this->db->bind('username',$username);
        return $this->db->resultSet();
    }

    private function tryLogin(string $username,string $password){
        $this->db->query('select * from users where (username = :username and password = :password) or (email=:username and password=:password)');
        $this->db->bind('username',$username);
        $this->db->bind('password',$password);
        $result = $this->db->resultSet();
        foreach($result as $row){
            return false;
        }
        return true;
    }

    public function login(string $username,string $password){
        if(!$this->findUser($username)){
            return USER_NOT_FOUND;
        }
        elseif ($this->tryLogin($username,$password)){
            return PASSWORD_WRONG;
        }
        else return LOGIN_OK;
    }

    public function isAdmin(string $username){
        $this->db->query('select * from users where username = :username and role = "admin"');
        $this->db->bind('username',$username);
        if(!$this->db->resultSet())
            return false;
        return true;
    }

    private function createUserUtil(string $username,string $password,$email,$firstname,$lastname){
        $this->db->query('insert into users(username, password,email,FirstName, LastName, role) value( :username, :password,:email,:firstname, :lastname,"user")');
        $this->db->bind('username',$username);
        $this->db->bind('password',$password);
        $this->db->bind('email',$email);
        $this->db->bind('firstname',$firstname);
        $this->db->bind('lastname',$lastname);
        $this->db->execute();
    }

    public function createUser(string $username,string $password,string $email,$firstname,$lastname) : string{
        if ($this->findUser($username)){
            $msg='?new_user_message='.USER_NOT_FOUND;
        }
        else {
            $this->createUserUtil($username,$password,$email,$firstname,$lastname);
            $msg='?new_user_message='.NEW_USER_OK;
        }
        return $msg;
    }

    public function checkEmail(string $email){
        $this->db->query("SELECT email FROM users WHERE email = :email; ");
        $this->db->bind('email',$email);
        return $this->db->resultSet();
    }
}
