<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 01-Jun-17
 * Time: 3:56 PM
 */
class Color extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('colorproductmodel');
    }

    public function lists()
    {
        $data = $this->colorproductmodel->apiList(9);

        header('Content-type: application/json');
        echo json_encode(['data' => $data, 'errcode' => 100]);
    }
}
