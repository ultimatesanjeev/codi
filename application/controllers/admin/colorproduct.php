<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 01-Jun-17
 * Time: 1:08 PM
 */
class ColorProduct extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('colorproductmodel');
    }

    public function lists()
    {
        $data['records'] = $this->colorproductmodel->lists();
//        print_r($data);die;
        $this->load->view('admin/includes/top_header');
        $this->load->view('admin/colorproductview', $data);
        $this->load->view('admin/includes/footer');
    }

    public function add()
    {
        $name = $this->input->post('name');
        $result = $this->colorproductmodel->create($name);
        redirect('admin/colorproduct/lists?message=' . $result);
    }
}