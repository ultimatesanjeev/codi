<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//error_reporting(0);

class User extends CI_Controller
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
        $this->load->model('telecallermodel');
        //$this->load->model('mastersmodel');

    }

    function img_upload($image_name, $temp_name, $url)
    {
        $image_name = explode(".", $image_name);
        $tot = count($image_name);
        $img_name = $image_name[$tot - 2] . "-" . time() . "." . $image_name[$tot - 1];
        $target = $url . "/" . basename($img_name);

        if (move_uploaded_file($temp_name, $target)) {
            return $img_name;
        }
    }


    public function add()
    {
        $user = $this->session->userdata('username');
        $loggedin = $this->session->userdata('is_logged_in');
        if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)) {


            if (isset($_POST) && !empty($_POST)) {


                $this->form_validation->set_rules('username', 'User Name', 'required');
                $this->form_validation->set_rules('emailid', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');


                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/includes/top_header');
                    $this->load->view('admin/telecallers');
                    $this->load->view('admin/includes/footer');
                } else {
                    $path = UPTELECALLER;

                    $image_name = $_FILES['telecaller_img']['name'];
                    $temp_name = $_FILES['telecaller_img']['tmp_name'];
                    $imgres = $this->img_upload($image_name, $temp_name, $path);

                    $addrecord = $this->telecallermodel->addTelecallers($this->input->post(), $imgres);
                    if ($addrecord) {
                        $data['add_data'] = 'Telecaller added successfully...';
                    } else {
                        $data['add_data'] = 'Telecaller allready exist with same details!...';
                    }
                    $this->load->view('admin/includes/top_header');
                    $this->load->view('admin/telecallers', $data);
                    $this->load->view('admin/includes/footer');
                }

            } else {
                $this->load->view('admin/includes/top_header');
                $this->load->view('admin/telecallers');
                $this->load->view('admin/includes/footer');
            }

        } else {
            redirect('admin/welcome/login');
        }


    }


    public function edit($uid)
    {
        $user = $this->session->userdata('username');
        $loggedin = $this->session->userdata('is_logged_in');
        if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)) {

            /*$data['school_type']=$this->mastersmodel->viewSchoolTypeList();
            $data['country_list']=$this->mastersmodel->viewCountryList();*/
            $data['user_record'] = $this->telecallermodel->viewTelecallerList($uid);


            if (isset($_POST) && !empty($_POST)) {

                $this->form_validation->set_rules('username', 'User Name', 'required');
                $this->form_validation->set_rules('emailid', 'Email', 'required|valid_email');
                //$this->form_validation->set_rules('password','Password','required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/includes/top_header');
                    $this->load->view('admin/telecallers', $data);
                    $this->load->view('admin/includes/footer');
                } else {

                    $path = UPTELECALLER;
                    $img_name = $_FILES['telecaller_img']['name'];
                    $temp_name = $_FILES['telecaller_img']['tmp_name'];


                    if ($img_name != '') {
                        $img_result = $this->img_upload($img_name, $temp_name, $path);

                        if ($img_result != '') {
                            @unlink($path . $this->input->post('old_image'));
                        }

                    } else {
                        $img_result = '';
                        $img_result = $this->input->post('old_image');
                    }

                    $addrecord = $this->telecallermodel->updateTelecaller($this->input->post(), $uid, $img_result);


                    if ($addrecord) {
                        $this->session->set_flashdata('edit_data', 'User\'s Updated successfully.');

                        //$data['edit_data']='Telecaller\'s Updated successfully...';
                    } else {
                        $this->session->set_flashdata('not_edit_data', 'User\'s not updated!.');
                        //$data['edit_data']='Telecaller\'s not updated!...';
                    }
                    redirect('admin/user/edit/' . $uid);

                    /* $this->load->view('admin/includes/top_header');
                     $this->load->view('admin/telecallers',$data);
                     $this->load->view('admin/includes/footer');*/
                }

            } else {
                $this->load->view('admin/includes/top_header');
                $this->load->view('admin/telecallers', $data);
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
            $userlist['record'] = $this->telecallermodel->viewUserList();
            /*echo '<pre>';
            print_r($userlist);
            echo '</pre>';*/
            $this->load->view('admin/includes/top_header');
            $this->load->view('admin/telecallerlist', $userlist);
            $this->load->view('admin/includes/footer');

        } else {
            redirect('admin/welcome/login');
        }


    }


    public function deletetelecaller($uid)
    {
        $user = $this->session->userdata('username');
        $loggedin = $this->session->userdata('is_logged_in');
        if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)) {

            $userlist = $this->telecallermodel->deleteTelecaller($uid);
            if (isset($userlist) && !empty($userlist)) {
                if ($userlist == 'active') {
                    $this->session->set_flashdata('del_data_active', 'Telecaller Activated successfully...');
                } else if ($userlist == 'inactive') {
                    $this->session->set_flashdata('del_data_inactive', 'Telecaller Deactivate successfully...');
                }
                redirect('admin/telecaller/view');
            } else {
                $this->session->set_flashdata('not_del_data', 'problem in activation/deactivation of telecaller');
                redirect('admin/telecaller/view');
            }
        } else {
            redirect('admin/welcome/login');
        }
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */