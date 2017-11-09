<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 01-Jun-17
 * Time: 2:01 PM
 */
class ColorProductModel extends CI_Model
{
    function lists()
    {
        $query = $this->db->get('colorProduct');
        if ($query) {
            return $query->result();
        }
    }

    function create($name)
    {
        $insert = $this->db->insert('colorProduct', ["name" => $name]);
        if ($insert) {
            return "Success";
        }
        return "Something went wrong";
    }

    function apiList($userId)
    {
        $this->db->where('isActive', true);
        $query = $this->db->get('colorProduct');
        if ($query) {
            $results = $query->result();
            foreach ($results as $key => $result) {
                $this->db->where('isActive', true);
                $this->db->where('colorProductId', $result->id);
                $q2 = $this->db->get('colorProductConfigs');
                if ($q2) {
                    $ress = $q2->result();
                    foreach ($ress as $key2 => $res) {
                        $this->db->where('isActive', true);
                        $this->db->where('userId', $userId);
                        $this->db->where('colorProductConfigId', $res->id);
                        $q3 = $this->db->get('colorUserProduct');
                        if ($q3->result()) {
                            $ress[$key2]->isBuyed = 1;
                        } else {
                            $ress[$key2]->isBuyed = 0;
                        }
                    }
                    $results[$key]->configs = $ress;
                } else {
                    $results[$key]->configs = [];
                }

            }
            return $results;
        }
    }
}