<?php
/**
 * Created by PhpStorm.
 * User: eNeMetcH
 * Date: 11/29/18
 * Time: 23:24
 */

class pets_model extends  CI_Model {

    function verify_login($email, $password){
        $this->db->where('email', $email);
        $run = $this->db->get('user');

        if($run->num_rows() > 0){
            $row = $run->row_array();
            if(password_verify($password, $row['password'])){
                $_SESSION['user_data']['role'] = $row['role_id'] == 1 ? 'Service' : 'Client';
                $_SESSION['user_data']['user_name'] = $row['email'];
                return $row['role_id'];
            }
            return FALSE;
        }
        return FALSE;
    }

    function insert_client($postData, $user_id){
        $insertArray = array(
            'fname' => $postData['f_name'],
            'lname' => $postData['l_name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'],
            'user_id' => $user_id
        );
        $this->db->insert('client', $insertArray);
        return TRUE;
    }

    function insert_service($postData, $user_id){
        $insertArray = array(
            'fname' => $postData['f_name'],
            'lname' => $postData['l_name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'],
            'user_id' => $user_id
        );
        $this->db->insert('service', $insertArray);
        return TRUE;
    }

    function insert_comment($postData){
        $insertArray = array(
            'fname' => $postData['f_name'],
            'lname' => $postData['l_name'],
            'email' => $postData['email'],
            'phone' => $postData['phone'],
            'comments' => $postData['comments']
        );

        $this->db->insert('contact', $insertArray);

        // email
        $msg = "Feedback from " . $postData['f_name'] . " " . $postData['l_name'] .": \n
            (email: ". $postData['email'] .")\n
            (phone: ". $postData['phone'] .")\n
            ". $postData['comments'] ."\n
            ";
        mail("pooja.jeergyal@mavs.uta.edu", "Feedback from Assignment 4", $msg);
    }

    function check_if_email_exists($email){
        $run = $this->db->get_where('user', array('email' => $email));
        if($run->num_rows() > 0) return TRUE;
        return FALSE;
    }

    function insert_user($email, $role_id){
        $password = "123456";
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insertArray = array(
            'email' => $email,
            'password' => $hashed_password,
            'role_id' => $role_id
        );

        $this->db->insert('user', $insertArray);
        return $this->db->insert_id();

    }

}