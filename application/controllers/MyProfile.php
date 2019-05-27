<?php

class MyProfile extends MY_Controller {

    public function index() {
        $data['getAdminData'] = $this->MY_Model->getProfileData();
        $this->load->view("myprofile/index", $data);
    }

    public function updateWeb() {
        $data = array(
            'fullName' => $this->input->post('fullName'),
            'email' => $this->input->post('email')
        );
        $this->db->where('id', $this->session->userdata('userId'));
        $this->db->update('tbl_Login', $data);
        echo 'update';
    }

    public function saveProfilePicWeb() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['images']['name']);
            $config['upload_path'] = 'Content/WebImages/MyProfileImages/';
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['file_name'] = $new_image_name;
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['$min_width'] = '0';
            $config['min_height'] = '0';
            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('images');
            if ($upload != NULL) {
                $data = array(
                    'imagePath' => 'Content/WebImages/MyProfileImages/' . time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['images']['name'])
                );
                $this->db->where('id', $this->session->userdata('userId'));
                $this->db->update('tbl_Login', $data);
                $this->session->set_flashdata('adminBackEnd', 'MyProfile Image Upload.');
                header("Location: http://hotelsameer.web44.net/AdminDashboard");
            } else {
                echo 'Not upload';
            }
        }
    }

    public function changePasswordWeb() {
        $query = $this->db->select('password')
                ->where('id', $this->session->userdata('userId'))
                ->get('tbl_Login');
        if ($query->num_rows() > 0) {  //Ensure that there is at least one result 
            foreach ($query->result_array() as $row) { //Iterate through results
                $databaseOldPass = $row['password'];
                $oldPassword = $this->input->post('oldpass');
                if ($databaseOldPass == $oldPassword) {
                    $data = array(
                        'password' => $this->input->post('newpass')
                    );
                    $this->db->where('id', $this->session->userdata('userId'));
                    $this->db->update('tbl_Login', $data);
                    echo "Password are changed.";
                } else {
                    echo "Plz Old Password Correct Insert.";
                }
            }
        }
    }

    //for Mobile


    public function getUserAllInformation() {
        header('Access-Control-Allow-Origin: *');
        $postdata12 = file_get_contents("php://input");
        $request14 = json_decode($postdata12);
        $id = $request14->id;
        $return_arr = array();
        $allresult = array();
        $this->db->where("id", $id);
        $query = $this->db->get('tbl_Login');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['fullName'] = $row['fullName'];
                $row_array['mobileNo'] = $row['mobileNo'];
                $row_array['email'] = $row['email'];
                $row_array['adharNo'] = $row['adharNo'];
                $row_array['note'] = $row['note'];
                $row_array['imagePath'] = 'http://hotelsameer.web44.net/' . $row['imagePath'];
                array_push($return_arr, $row_array);
            }
            $allresult['userAllInformation'] = $return_arr;
            echo json_encode($allresult);   
        }
    }

    //update data for mobile app

    public function updateDataMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $fullName = $request->fullName;
        $mobileNo = $request->mobileNo;
        $email = $request->email;
        $adharNo = $request->adharNo;
        $note = $request->note;
        $userId = $request->userId;
        if (!empty($fullName)) {
            $data = array(
                'fullName' => $fullName,
                'mobileNo' => $mobileNo,
                'email' => $email,
                'adharNo' => $adharNo,
                'note' => $note,
            );
            $this->db->where('id', $userId);
            $this->db->update('tbl_Login', $data);
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    public function mobileUploadImage() {
        header('Access-Control-Allow-Origin: *');
        $options = file_get_contents("php://input");
        $request = json_decode($options);
        $userId = basename($_POST['userId']);
        $target_path = "Content/WebImages/MyProfileImages/";
        $target_path1 = $target_path . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path1)) {
            $data = array(
                'imagePath' => $target_path1
            );
            $this->db->where('id', $userId);
            $this->db->update('tbl_Login', $data);
            echo json_encode("yes");  
        }
    }

    public function changePasswordMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $oldPass = $request->oldPass;
        $newPass = $request->newPass;
        $userId = $request->userId;
        $this->db->where('password', $oldPass);
        $this->db->where('id', $userId);
        $query = $this->db->get('tbl_Login');
        if ($query->num_rows() > 0) {   
            foreach ($query->result_array() as $row) {
                $data = array(
                    'password' => $newPass
                );
                $this->db->where('id', $userId);
                $this->db->update('tbl_Login', $data);
                echo json_encode("yes");   
            }   
        } else {
            echo json_encode("no");
        }
    }

}
