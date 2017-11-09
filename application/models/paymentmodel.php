<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 30-May-17
 * Time: 2:07 PM
 */
class PaymentModel extends CI_Model
{
    function create($userId, $amountFromSystem, $orderId)
    {
        $data = array(
            "userId" => $userId,
            "amountFromSystem" => $amountFromSystem,
            "orderId" => $orderId
        );
        $insert = $this->db->insert('payments', $data);
        if ($insert) {
            return "Inserted";
        }
    }

    function update($orderId, $amountFromGateway, $paymentId)
    {
        $data = array(
            "paymentId" => $paymentId,
            "amountFromGateway" => $amountFromGateway,
            "isActive" => true
        );
        $this->db->where('orderId', $orderId);
        $update = $this->db->update('payments', $data);
        if ($update) {
            return "updated";
        }
    }
}