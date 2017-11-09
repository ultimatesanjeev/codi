<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 26-May-17
 * Time: 5:13 PM
 */
class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('productmodel');
    }

    public function lists()
    {
        $errcode = -1;
        $data = [];
        $result = $this->productmodel->lists();
        if (isset($result)) {
            $data['data'] = $result;
            $errcode = 100;
        } else {
            $data['data'] = null;
        }
        $data['errcode'] = $errcode;
        header('Content-type: application/json');
        echo json_encode($data);
    }
}