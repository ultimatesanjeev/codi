<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//error_reporting(0);
class Telecallermodel extends CI_Model
{


    //================================Add Telecaller Details================================================================

    public function addTelecallers($postdata, $imgres = '')
    {

        if (isset($imgres) && !empty($imgres)) {
            $img = $imgres;
        } else {
            $img = '';
        }


        $this->db->where('user_email', $postdata['emailid']);
        $query = $this->db->get('user');
        if ($query->num_rows > 0) {
            return false;
        } else {
            $data = array(
                'username' => $postdata['username'],
                'user_email' => $postdata['emailid'],
                'password' => sha1($postdata['password']),
                'image' => $imgres);
            $insert = $this->db->insert('user', $data);
            if ($insert) {
                $userid = $this->db->insert_id();
                foreach (range('a', 'h') as $i) {
                    $chatboxdata = array(
                        'auid' => $userid,
                        'chatbox_name' => $userid . $i);
                    $this->db->insert('admin_users_chatbox', $chatboxdata);

                }

                /*echo '<pre>';
                print_r($this->db->queries);
                echo '</pre>';exit;*/


                // return $this->db->insert_id();
                return true;
            } else {
                return false;
            }


        }


    }

    //****************************End Add Telecaller Details****************************************************************


    //================================Update Telecaller Details================================================================

    public function updateTelecaller($postdata, $uid, $img_result)
    {
        /*echo '<pre>';
        print_r($postdata);
        echo $img_result;
        echo '</pre>';*/        //exit;


        if (isset($img_result) && !empty($img_result)) {
            $image = $img_result;
        } else {
            $image = $postdata['old_img'];
        }


        if (isset($postdata['password']) && !empty($postdata['password'])) {
            $data = array(
                'username' => $postdata['username'],
                'user_email' => $postdata['emailid'],
                'password' => sha1($postdata['password']),
                'image' => $image);
        } else {
            $data = array(
                'username' => $postdata['username'],
                'user_email' => $postdata['emailid'],
                'image' => $image);

        }

        $this->db->where('id', $uid);
        $updatetelecaller = $this->db->update('user', $data);

        /*echo '<pre>';
        print_r($this->db->queries);
        echo '</pre>';exit;*/

        if ($updatetelecaller) {
            return true;
        } else {
            return false;
        }


    }

    //****************************End Update Telecaller Details****************************************************************


    //================================Delete School ================================================================

    public function deleteTelecaller($uid)
    {
        //$this->db->where('id',$uid);
        /*$query=$this->db->delete('user');
        $this->db->where('id',$uid);
        $updatetelecaller=$this->db->update('user',$data);
        */


        $this->db->where('id', $uid);
        $query = $this->db->get('user');

        $res = $query->result();
        //echo $res[0]->status;
        //print_r($res);

        if ($res[0]->status == 'active') {
            $data = array('status' => 'inactive');
        } else {
            $data = array('status' => 'active');
        }
        //exit;
        $this->db->where('id', $uid);
        $updatetelecaller = $this->db->update('user', $data);
        $this->db->where('id', $uid);
        $query = $this->db->get('user');
        $res = $query->result();
        /* echo '<pre>';
            print_r($this->db->queries);
            echo '</pre>';exit;*/
        if ($query) {
            return $res[0]->status;
        } else {
            return false;
        }
    }
    //****************************End Delete Schools ****************************************************************

    //================================View School Image================================================================
    public function viewTelecallerList($uid = '')
    {
        if (isset($uid) && !empty($uid)) {
            $this->db->where('id', $uid);
        }
        $query = $this->db->get('user');
        /*echo '<pre>';
        print_r($this->db->queries);
        echo '</pre>';*/
        if ($query->num_rows > 0) {

            return $query->result();
        } else {
            return false;
        }
    }

    //****************************End View Schools image****************************************************************


    public function viewUserList($uid = '')
    {
        if (isset($uid) && !empty($uid)) {
            $this->db->where('iD', $uid);
        }
        $query = $this->db->get('users');
        /*echo '<pre>';
        print_r($this->db->queries);
        echo '</pre>';*/
        if ($query->num_rows > 0) {

            return $query->result();
        } else {
            return false;
        }
    }


    //================================Delete School Image ================================================================

    public function deleteSchoolImageList($sid)
    {
        $this->db->where('mimg_id', $sid);
        $query = $this->db->delete('image');
        /* echo '<pre>';
            print_r($this->db->queries);
            echo '</pre>';exit;*/
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    //****************************End Delete Schools Image ****************************************************************


    //================================Delete School Image ================================================================

    public function deleteSchoolImageListAjax($imgid, $sid)
    {
        $this->db->where('mimg_id', $imgid);
        $this->db->where('master_id', $sid);
        $query = $this->db->delete('image');
        /* echo '<pre>';
            print_r($this->db->queries);
            echo '</pre>';exit;*/
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    //****************************End Delete Schools Image ****************************************************************


//*******End	
}

?>