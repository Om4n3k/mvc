<?php

class User_Model extends Model {
    function __construct()
    {
        parent::__construct();
    }

    function loginUser($data) {
        try {
            $result = $this->db->selectOne('SELECT `userid`,`token` FROM `t_user` WHERE `login`=:login AND `password`=:password',[
                ':login' => $data['login'],
                ':password' => $data['password']
            ]);
            if(!$result) throw new Exception();
            Session::set('userToken',$result['token']);
            return true;
        } catch(Exception $e) {

            return false;
        }
    }

    function registerUser($data) {
        try {
            if(!$this->db->insert('t_user',[
                'login' => $data['login'],
                'password' => $data['password'],
                'name' => $data['name'],
                'token' => Utils::random_str()
            ])) throw new Exception();
            return true;
        } catch(Exception $e) {

            return false;
        }
    }
}