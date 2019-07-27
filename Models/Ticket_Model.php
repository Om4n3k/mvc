<?php

class Ticket_Model extends Model {
    function __construct()
    {
        parent::__construct();
    }

    function getAllTickets($where=null) {
        try {
            $result = $this->db->selectAll('SELECT * FROM `t_ticket` '.$where.' ORDER BY `ticketid` DESC');
            if(!$result) throw new Exception();
            return $result;
        } catch(Exception $e) {

            return false;
        }
    }

    function getAllComments($id) {
        try {
            $result = $this->db->selectAll('SELECT * FROM `t_ticket_comment` WHERE `ticketid`='.$id.' ORDER BY `post_date` ASC');
            if(!$result) throw new Exception();
            return $result;
        } catch(Exception $e) {

            return false;
        }
    }

    function getTicket($data) {
        try {
            $result = $this->db->selectOne('SELECT * FROM `t_ticket` WHERE `ticketid`=:ticketid',[
                ':ticketid'=>$data
            ]);
            if(!$result) throw new Exception();
            return $result;
        } catch(Exception $e) {

            return false;
        }
    }

    function createTicket($data) {
        try {
            $files = Utils::reArrayFiles($data['files']);
            if(is_array($files)) {
                foreach($files as $file) {
                    $img =          $file['name'];
                    $tmp =          $file['tmp_name'];
                    $ext =          strtolower(pathinfo($img, PATHINFO_EXTENSION));
                    $final_image =  md5($this->db->lastInsertId()).'.'.$ext;
                    $final_path =   $this->config['paths']['upload'].'ticket/'.strtolower($final_image);
                    move_uploaded_file($tmp, $final_path);
                    ////
                }
            }
            $vars = [
                'title'=>$data['title'],
                'text'=>$data['description'],
                'post_date'=>time(),
                'solvetion'=>$data['type'],
                'added_by'=>(empty($data['userid'])) ? -1 : $data['userid'],
            ];
            if(!empty($data['discord'])) $vars['added_by_discord']=$data['discord'];
            $result = $this->db->insert('t_ticket',$vars);
            if($result) return true;
            else throw new Exception();
        } catch(Exception $e) {
            return false;
        }
    }

    function createComment($data) {
        try{
            $result = $this->db->insert('t_ticket_comment',$data);
            if($result) return true;
            else throw new Exception();
        } catch(Exception $e) {

        }
    }
}