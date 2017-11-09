<?php

/**
 * Created by PhpStorm.
 * User: haseeb
 * Date: 25-May-17
 * Time: 6:45 PM
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
        $data['products'] = $this->productmodel->lists();
        $this->load->view('admin/includes/top_header');
        $this->load->view('admin/products', $data);
        $this->load->view('admin/includes/footer');
    }

    public function add()
    {
        //print_r($this->input->post());die();
        $add = $this->productmodel->add($this->input->post());
        redirect('admin/product/lists?submission=' . $add);
    }

    public function delete()
    {
        /*print_r($this->input->get());
        die();*/
        $del = $this->productmodel->delete($this->input->get());
        redirect('admin/product/lists?submission=' . $del);
    }

    public function update()
    {
        $data['record'] = $this->productmodel->getDetail($this->input->get());
        $this->load->view('admin/includes/top_header');
        $this->load->view('admin/productupdate', $data);
        $this->load->view('admin/includes/footer');
    }
    public function edit()
    {

        $del = $this->productmodel->edit($this->input->post());
        redirect('admin/product/lists?submission=' . $del);
    }
}