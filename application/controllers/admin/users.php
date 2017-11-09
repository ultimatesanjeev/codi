<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//error_reporting(0);

class Users extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
        //$this->load->model('mastersmodel');

    }


    public function add()
    {
        $user = $this->session->userdata('username');
        $loggedin = $this->session->userdata('is_logged_in');
        if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)) {

            if ($this->session->userdata('login_type') == 1) {


                if (isset($_POST) && !empty($_POST)) {


                    $this->form_validation->set_rules('username', 'User Name', 'required');
                    $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
                    $this->form_validation->set_rules('emailid', 'Email', 'required|valid_email');
                    $this->form_validation->set_rules('homeaddress', 'Address', 'required');
                    $this->form_validation->set_rules('officeaddress', 'Office Address', 'required');
                    $this->form_validation->set_rules('peeraddress', 'Peer Address', 'required');


                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('admin/includes/top_header');
                        $this->load->view('admin/users');
                        $this->load->view('admin/includes/footer');
                    } else {
                        $addrecord = $this->usermodel->addCustomers($this->input->post());

                        if ($addrecord) {
                            $data['add_data'] = 'Customer\'s details added successfully...';
                        } else {
                            $data['add_data'] = 'Customer\'s details not added!...';
                        }
                        $this->load->view('admin/includes/top_header');
                        $this->load->view('admin/users');
                        $this->load->view('admin/includes/footer');
                    }

                } else {
                    $this->load->view('admin/includes/top_header');
                    $this->load->view('admin/users');
                    $this->load->view('admin/includes/footer');
                }

            } else {
                redirect('admin/welcome/login');
            }
        } else {
            $this->session->set_flashdata('alert_data', 'Your are not authorised to open that url');
            redirect('admin/welcome/dashboard');
        }

    }


    public function edit($uid)
    {
        $user = $this->session->userdata('username');
        $loggedin = $this->session->userdata('is_logged_in');
        if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)) {

            /*$data['school_type']=$this->mastersmodel->viewSchoolTypeList();
            $data['country_list']=$this->mastersmodel->viewCountryList();*/
            $data['user_record'] = $this->usermodel->viewUsersList($uid);


            if (isset($_POST) && !empty($_POST)) {

                $this->form_validation->set_rules('username', 'User Name', 'required');
                $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
                $this->form_validation->set_rules('emailid', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('homeaddress', 'Address', 'required');
                $this->form_validation->set_rules('officeaddress', 'Office Address', 'required');
                $this->form_validation->set_rules('peeraddress', 'Peer Address', 'required');


                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/includes/top_header');
                    $this->load->view('admin/users', $data);
                    $this->load->view('admin/includes/footer');
                } else {
                    $addrecord = $this->usermodel->updateCustomers($this->input->post(), $uid);


                    if ($addrecord) {
                        $data['edit_data'] = 'Customer\'s details Updated successfully...';
                    } else {
                        $data['edit_data'] = 'Customer\'s details not updated!...';
                    }
                    $this->load->view('admin/includes/top_header');
                    $this->load->view('admin/users', $data);
                    $this->load->view('admin/includes/footer');
                }

            } else {
                $this->load->view('admin/includes/top_header');
                $this->load->view('admin/users', $data);
                $this->load->view('admin/includes/footer');
            }

        } else {
            redirect('admin/welcome/login');
        }
    }


    public function view()
    {
        $user = $this->session->userdata('username');
        $loggedin = $this->session->userdata('is_logged_in');
        if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)) {
            //$this->load->model('schoolmodel');
            $userlist['record'] = $this->usermodel->viewUsersList();
            /*echo '<pre>';
            print_r($userlist);
            echo '</pre>';*/
            $this->load->view('admin/includes/top_header');
            $this->load->view('admin/userlist', $userlist);
            $this->load->view('admin/includes/footer');

        } else {
            redirect('admin/welcome/login');
        }


    }


    public function deleteuser($uid)
    {
        $user = $this->session->userdata('username');
        $loggedin = $this->session->userdata('is_logged_in');
        if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)) {

            $userlist = $this->usermodel->deleteUser($uid);
            if (isset($userlist) && !empty($userlist)) {
                $this->session->set_flashdata('del_data', 'Customer deleted successfully...');
                redirect('admin/users/view');
            } else {
                $this->session->set_flashdata('del_data', 'Customer not deleted !...');
                redirect('admin/users/view');
            }
        } else {
            redirect('admin/welcome/login');
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */