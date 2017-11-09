<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 31-May-17
 * Time: 1:08 PM
 */
class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customermodel');
    }

    public function lists()
    {
        $result['record'] = $this->customermodel->lists();
     /*   echo "<pre>";
        print_r($result);
        die;*/
        if ($result) {
            $this->load->view('admin/includes/top_header');
            $this->load->view('admin/customer', $result);
            $this->load->view('admin/includes/footer');
        }
    }

}