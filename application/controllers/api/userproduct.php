<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 30-May-17
 * Time: 2:04 PM
 */
class UserProduct extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('productmodel');
        $this->load->model('paymentmodel');
        $this->load->model('userproductmodel');
    }

    public function buy()
    {
        $productId = $this->input->post('productId');
        $token = $this->input->post('token');
        $userId = str_replace(TOKEN_PREFIX, '', $token);
        $data['id'] = $productId;
        $product = $this->productmodel->getDetail($data);
        $orderId = md5(uniqid() . uniqid());
        $payment = $this->paymentmodel->create($userId, $product[0]->price, $orderId);
        header('Content-type: application/json');
        if ($payment) {
            $userProduct = $this->userproductmodel->create($userId, $productId, $orderId);
            if ($userProduct) {
                echo json_encode(["data" => ["orderId" => $orderId, "userId" => $userId, "amount" => $product[0]->price], "errcode" => 100]);
            } else {
                echo json_encode(["data" => "Something went wrong", "errcode" => -1]);
            }
        } else {
            echo json_encode(["data" => "Something went wrong", "errcode" => -1]);
        }


    }

    public function webhook()
    {
        $orderId = $this->input->post('orderId');
        $paymentId = $this->input->post('paymentId');
        $amountFromGateway = $this->input->post('amountFromGateway');
        $pmt = $this->paymentmodel->update($orderId, $amountFromGateway, $paymentId);
        if ($pmt) {
            $userProduct = $this->userproductmodel->update($orderId);
            if ($userProduct) {
                header('Content-type: application/json');
                echo json_encode(["data" => "Success", "errcode" => 100]);
            }
        }
    }
}