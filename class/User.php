<?php


class User
{
    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    private function findUser(string $userName)  {
        $this->db->query('select * from users where (username = :username) or (email = :username)');

        $this->db->bind('username',$userName);
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

    public function login(string $userName,string $password){
        if(!$this->findUser($userName)){
            return USER_NOT_FOUND;
        }
        elseif ($this->tryLogin($userName,$password)){
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
        $this->db->query('insert into users(FirstName, LastName, username, password,email, role) value(:firstname, :lastname , :username, :password,:email,"user")');
        $this->db->bind('firstname',$firstname);
        $this->db->bind('lastname',$lastname);
        $this->db->bind('username',$username);
        $this->db->bind('password',$password);
        $this->db->bind('email',$email);
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

    public function changePassUtil(string $username,string $password){
        $this->db->query('UPDATE users SET password = :password WHERE username = :username or email = :username;');
        $this->db->bind('password',$password);
        $this->db->bind('username',$username);
        $this->db->execute();
    }

    public function changePass(string $username,string $password_initial,string $password_repeat1,string $password_repeat2) : string{
        $msg="?change_pass=";
        if($password_repeat1!==$password_repeat2){
            return $msg.PASSWORD_NOT_MATCH;
        }
        $result = $msg.$this->login($username,$password_initial);
        if($result==LOGIN_OK)
            $this->changePassUtil($username,$password_repeat1);
        return $result;
    }

    public function checkEmail(string $email){
        $this->db->query("SELECT email FROM users WHERE email = :email; ");
        $this->db->bind('email',$email);
        return $this->db->resultSet();
    }
}
