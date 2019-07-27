<?php
class User extends Database{
    public $id;
    public $password;
    public $token;
    public $name;
    public $secLvl;
    public $role;
    public $logged = false;

    function __construct()
    {
        $this->db = new Database('mysql','localhost','ticket','root','');
    }

    function init($idOrToken)
    {
        if(is_int($idOrToken)) {
            $sql = 'SELECT * FROM `t_user` WHERE `userid`=:idToken';
        } else {
            $sql = 'SELECT * FROM `t_user` WHERE `token`=:idToken';
        }
        
        $result = $this->db->selectOne($sql,[
            ':idToken' => $idOrToken,
        ]);

        if($result) {
            $this->id = $result['userid'];
            $this->login = $result['login'];
            $this->password = $result['password'];
            $this->token = $result['token'];
            $this->name = $result['name'];
            $this->secLvl = $result['secLvl'];
            $this->role = $result['role'];
            $this->logged = true;
        }

        return $this;
    }

    function getUserNameById($id) {
        $result = $this->db->selectOne("SELECT `login` FROM `t_user` WHERE `userid`=:userid",[
            ':userid' => $id
        ]);
        if(!$result) return "Gość";
        return $result['login'];
    }

    function getUserdataById($id) {
        $result = $this->db->selectOne("SELECT * FROM `t_user` WHERE `userid`=:userid",[
            ':userid' => $id
        ]);
        return $result['login'];
    }

    function getUserDiscordById($id) {
        $result = $this->db->selectOne("SELECT `discord` FROM `t_user` WHERE `userid`=:userid",[
            ':userid' => $id
        ]);
        if(!$result) return "Brak";
        return $result['discord'];
    }

    function getRole($id) {
        $result = $this->db->selectOne("SELECT `role` FROM `t_user` WHERE `userid`=:userid",[
            ':userid' => $id
        ]);
        if(!$result) return "Brak";
        return $result['role'];
    }
}
?>