<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 25-May-17
 * Time: 7:02 PM
 */
class ProductModel extends CI_Model
{
    function lists()
    {
        $query = $this->db->get('products');
        /* echo '<pre>';
        print_r($this->db->queries);
        echo '</pre>';*/
        if ($query->num_rows > 0) {

            return $query->result();
        } else {
            return false;
        }
    }

    function add($data)
    {
        $data = array(
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']);
        $insert = $this->db->insert('products', $data);
        if ($insert) {
            return "Product added successfully";
        }
        return "Product not added";
    }

    function delete($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $delete = $this->db->delete('products');
        if ($delete) {
            return "Product deleted successfully";
        }
        return "Product not deleted";
    }

    function getDetail($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->result();
    }

    function edit($val)
    {

        $data = array(
            'name' => $val['name'],
            'description' => $val['description'],
            'price' => $val['price']
        );
        $this->db->where('id', $val['id']);
        $query = $this->db->update('products', $data);
        if ($query) {
            return "Product updated successfully";
        }
        return "Product not update";

    }
}