<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 26-May-17
 * Time: 7:11 PM
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userdbmodel');
        $this->load->model('colorproductmodel');
    }

    public function add()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user_email = $this->input->post('user_email');
        $login_type = $this->input->post('login_type');
        $result = $this->userdbmodel->create($username, sha1($password), $user_email, $login_type);
        $data = [];
        $errcode = -1;
        if ($result) {
            $data['data'] = $result;
            if ($result == 'Created successfully') {
                $errcode = 100;
            }
        }
        $data['errcode'] = $errcode;
        header('Content-type: application/json');
        echo json_encode($data);
    }

    public function login()
    {
        $json = file_get_contents('php://input');
        $request = json_decode($json);
        $password = $request->password;
        if (!$password) {
            $password = 'asdf@1234';
        }
        $username = $request->username;
        $user_email = $request->user_email;
        $result = $this->userdbmodel->login($user_email, sha1($password), $username, 2);
        $data = 'Invalid Credential';
        $errcode = -1;

        if ($result) {
            $result->token = TOKEN_PREFIX . $result->id . TOKEN_PREFIX;
            unset($result->password);
            $result->colors = $this->colorproductmodel->apiList($result->id);
            $data = $result;
            $errcode = 100;
        }
        //$token = TOKEN_PREFIX . $result->id . TOKEN_PREFIX;
        header('Content-type: application/json');
        echo json_encode(['data' => $data, 'errcode' => $errcode]);
    }

    public function detail()
    {
        $json = file_get_contents('php://input');
        $request = json_decode($json);
        $token = $request->token();
        $userId = str_replace(TOKEN_PREFIX, '', $token);
    }
}