<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 31-May-17
 * Time: 1:12 PM
 */
class CustomerModel extends CI_Model
{
    function lists()
    {
        $this->db->select('user.username,user.user_email,login_type,status,user.id,userProduct.isActive as isSubscribed');
//        $this->db->where('userProduct.isActive', true);
        $this->db->join('userProduct', 'userProduct.userId=user.id', 'left');
        $query = $this->db->get('user');
        if ($query) {
            return $query->result();
        }
        return null;
    }
}