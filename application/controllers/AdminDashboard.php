<?php

class AdminDashboard extends MY_Controller {

    public function index() {
        $userType = $this->session->userdata('loginType');
        $data ['getUserData'] = $this->MY_Model->getAdminData();
        $data ['getTotalUserCount'] =$this->MY_Model->getTotalUserList();
        $data ['getTotalFreeTable'] =$this->MY_Model->getTotalFreeTable();
        $data ['getTotalBookingTable'] =$this->MY_Model->getTotalBookingTable();
        $data ['getTotalTodayAmount'] =$this->MY_Model->getTotalTodayIncode();
        $date = date('Y-m-d');
        if (file_exists("Content/BackUp/HotelSameer_' . $date . '.sql.zip")) {
            unlink("Content/BackUp/HotelSameer_' . $date .'.sql.zip");
        }
        if ($userType == "Admin") {
            $this->load->view('adminDashboard/index', $data);
        } else {
            $data['getalldataSlider'] = $this->MY_Model->getadminSlider();
            $data['getNote'] = $this->MY_Model->getNoteHome();
            $this->load->view('home/home', $data);
        }
    }

}
