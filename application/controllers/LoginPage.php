<?php

class LoginPage extends MY_Controller {

    public function index() {
        $userType = $this->session->userdata('loginType');
        $userId = $this->session->userdata('userId');

        $data ['getUserData'] = $this->MY_Model->getAdminData();
        if (!empty($userType) && !empty($userId))
            $this->load->view('adminDashboard/index', $data);
        else
            $this->load->view('loginPage/index');
    }
   
    public function loginWeb() {   
        $this->db->where('mobileNo', $this->input->post('mobileNo'));     
        $this->db->where('password', $this->input->post('password'));
        $this->db->where('status', 'Active');
        $query = $this->db->get('tbl_Login');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $currentId = $row['id'];
                $loginCont = $row['loginCount'] + 1;        
                $this->session->sess_expiration = '157680000';// expires in 5 Year
                $this->session->set_userdata('username', $row['fullName']);
                $this->session->set_userdata('userId', $currentId);
                $this->session->set_userdata('loginType', $row['type']);
                $dataup = array(
                    'loginCount' => $loginCont
                );
                $this->db->where('id', $currentId);
                $this->db->update('tbl_Login', $dataup);
                $this->session->set_flashdata('registationFlash', 'Login done.');
               header("Location: http://hotelsameer.web44.net/AdminDashboard");
               break;
            }
        } else {
            $this->session->set_flashdata('registationFlash', 'Login not done.');
              header("Location: http://hotelsameer.web44.net/LoginPage");
        }
       // header("Location: http://menuapphybrid.newapptec.com/LoginPage");
        //redirect(base_url().'LoginPage');
    }

    public function forGetPasswordWeb() {
        $username = $this->input->post('txtEmail');
        $this->db->where('userName', $username);
        $query = $this->db->get('tblAdminRegistation');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $password = 'Your password is = ' . $row['password'];
                $password = wordwrap($password, 70);
                mail($username, "Forgot Password", $password);
                $this->session->set_flashdata('registationFlash', 'Email Sent.');
            }
        } else {
            $this->session->set_flashdata('registationFlash', 'Email not Sent.');
        }
        header("Location: http://menuapphybrid.newapptec.com/LoginPage");
    }

    public function forGetPass() {

        $request = file_get_contents('php://input');
        $input = json_decode($request,true);

        ini_set("SMTP", "mail.newapptec.com");
        ini_set("smtp_port", "465");
        ini_set("sendmail_from", "mail.newapptec.com");

        $email = 'onlyappasaheb4@gmail.com';
        $email_subject = "Enquery ";
        $email_body = "Name: 'hi'.\n" .
                "Contact: 'app'.\n" .
                "Email: 'we'.\n" .
                "Message: 'adf'.\n" .
                "fdsa \n" .
                "dfadsfa \n";

        $to = "onlyappasaheb4@gmail.com"; //"info@hsoftech.com";
        $header = "From: $email\r\n";


        //Send the email!
        if (mail($to, $email_subject, $email_body, $header)) {

            echo"yes";
        } else {

            echo "no";
        }
    }
    
  

    //For Mobile
    public function registationMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        $time = date("h:i:sa");
        $name = $request->name;
        $mobileNo = $request->mobileNo;
        $email = $request->email;
        $address = $request->address;
        $area = $request->area;
        $city = $request->city;
        $pin = $request->pin;
        $state = $request->state;
        $country = $request->country;
        $pass = $request->pass;
        $tokenNo = $request->tokenNo;
        if (!empty($name)) {
            $data = array(
                'date' => $date,
                'time' => $time,
                'name' => $name,
                'mobileNo' => $mobileNo,
                'email' => $email,
                'address' => $address,
                'area' => $area,
                'city' => $city,
                'pin' => $pin,
                'state' => $state,
                'country' => $country,
                'password' => $pass,
                'imagePath' => 'Content/Images/WebImage/MyProfile/myProfileDefultIcon.png',
                'loginCont' => 1,
                'status' => 'Active',
                'tokenNo' => $tokenNo,
                'runningStatus' => 'Running'
            );
            echo json_encode("yes");
            $this->db->insert('tblUserRegistation', $data);
        } else {
            echo json_encode("yes");
        }
    }

    public function loginMobile() {
        header('Access-Control-Allow-Origin: *');
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $type = $request->type;
        $mobileNo = $request->mobileNo;
        $password = $request->password;
        $tokenNoNew = $request->tokenNo;
         $return_arr = array();
        $allresult = array();
         $this->db->where('type', $type);
        $this->db->where('mobileNo', $mobileNo);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_Login');   
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $newId = $row['id'];
                $loginCont = $row['loginCount'] + 1;
                 $dataup = array(
                    'loginCount' => $loginCont
                );
                $this->db->where('id', $newId);
                $this->db->update('tbl_Login', $dataup);
                $alldata = "yes" . "=" . $newId;  
                echo json_encode($alldata);
            }
        } else {
            echo json_encode('no');
        }
      
    }

    public function tokenNoUpdate($val, $newId) {
        $data = array(
            'tokenNo' => $val
        );
        $this->db->where('id', $newId);
        $this->db->update('tblUserRegistation', $data);
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('loginType');
       header("Location: http://hotelsameer.web44.net/LoginPage");
    }

}
