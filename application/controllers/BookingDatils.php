<?php

class BookingDatils extends MY_Controller {
    //put your code here
    public function index(){
        $data ['getTableBookingDetails'] =$this->MY_Model->getAllBookingData();
        $this->load->view('bookingDatils/bookingDatils',$data);
    }
}
