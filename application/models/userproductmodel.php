<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 30-May-17
 * Time: 2:27 PM
 */
class UserProductModel extends CI_Model
{
    function create($userId, $productId, $orderId)
    {
        $data = array(
            "userId" => $userId,
            "productId" => $productId,
            "orderId" => $orderId
        );
        $insert = $this->db->insert('userProduct', $data);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    function update($orderId)
    {
        $data = array(
            "isActive" => true
        );
        $this->db->where('orderId', $orderId);
        $update = $this->db->update('userProduct', $data);
        if ($update) {
            return "updated";
        }
    }
}