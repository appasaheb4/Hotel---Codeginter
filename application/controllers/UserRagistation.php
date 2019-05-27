<?php

class UserRagistation extends MY_Controller {

    //put your code here
    public function index() {
        $this->load->view('userRagistation/userRagistation');
    }

    public function insertWeb() {  
        $imageName2 = $_FILES['images']['name'];
        $th1_tmp2 = $_FILES['images']['tmp_name'];
        move_uploaded_file($th1_tmp2, "Content/WebImages/MyProfileImages/$imageName2");
        
       if (empty($imageName2)) {
            $imageName2="Content/WebImages/DefulatImages/defulatIcon.jpg";
       }
       else{
          $imageName2='Content/WebImages/MyProfileImages/' . $imageName2;
       }
            
                date_default_timezone_set('Asia/Kolkata');
                $time = date("h:i:sa");
                $data = array(  
                    'date' => $this->input->post('txtDate'),
                    'time' => $time,
                    'fullName' => $this->input->post('txtFullName'),
                    'mobileNo' => $this->input->post('txtContactNo'),
                    'email' => $this->input->post('txtEmail'),
                    'adharNo' => $this->input->post('txtAdharNO'),
                    'password' => $this->input->post('txtConfirmPassword'),
                    'imagePath' => $imageName2,       
                    'type' => $this->input->post('selectUserType'),
                    'loginCount' => 0,
                    'note' => $this->input->post('txtNote'),  
                    'status' => $this->input->post('selectUserStatus'),
                    'userId' => $this->session->userdata('userId'),  
                );
                $this->db->insert('tbl_Login', $data);
                $this->session->set_flashdata('adminBackEnd', 'User Registation Done.');
                header("Location: http://hotelsameer.web44.net/AdminDashboard");
            }
}
    