<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Ankur Agrawal 
**/

class Auth_model extends CI_Model {

    public function authenticate($data) 
    {
        $this->db->where(['user_name' => $data['user_name'] , 'status' => 1 ]);
        $query = $this->db->get('user');
        if($query->num_rows() == 0)
            return false;

        $user = $query->row();
        // echo password_hash($data['pwd'], PASSWORD_DEFAULT);
        // echo "<br>".$data['uname'];
        // exit;
        return password_verify($data['password'], $user->password) ? $user : FALSE;
    }


    public function changeLoginPassword($h, $user_id) {
		$this->db->where('id', $user_id);
		$flag=$this->db->update('user', $h);
		if($flag){
            return true;
        }
        else{
            return false;
        }
    }
    
    
}
