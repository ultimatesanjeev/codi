<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 26-May-17
 * Time: 7:16 PM
 */
class UserDbModel extends CI_Model
{
    function create($username, $password, $user_email, $login_type)
    {
        $this->db->where('user_email', $user_email);
        $select = $this->db->get('user');
        if ($select) {
            return "Email Already Exist!";
        }
        $data = array(
            'username' => $username,
            'password' => $password,
            'user_email' => $user_email,
            'login_type' => $login_type
        );
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            return "Created successfully";
        }
    }

    function login($user_email, $password, $username, $login_type)
    {
        $this->db->where('user_email', $user_email);
        $this->db->where('password', $password);
        $select = $this->db->get('user');
        if ($select) {
            $result = $select->result()[0];
            if ($result) {
                $result->isSubscribedOVOCPlus = false;
                $this->db->where('userId', $result->id);
                $this->db->where('isActive', true);
                $q = $this->db->get('userProduct');
                if ($q->result()) {
                    $result->isSubscribedOVOCPlus = true;
                }
                return $result;
            } else {
                $data = array(
                    "username" => $username,
                    "user_email" => $user_email,
                    "login_type" => $login_type,
                    "password" => $password
                );
                $insert = $this->db->insert('user', $data);
                if ($insert) {
                    $this->db->where('user_email', $user_email);
                    $this->db->where('password', $password);
                    $select = $this->db->get('user');
                    if ($select) {
                        $result = $select->result()[0];
                        if ($result) {
                            $result->isSubscribedOVOCPlus = false;
                            $this->db->where('userId', $result->id);
                            $this->db->where('isActive', true);
                            $q = $this->db->get('userProduct');
                            if ($q->result()) {
                                $result->isSubscribedOVOCPlus = true;
                            }
                            return $result;
                        }
                    }
                }
            }

        }
    }
}