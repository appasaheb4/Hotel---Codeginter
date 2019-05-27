<?php

class AddTable extends MY_Controller {

    //put your code here

    public function index() {
        $data ['getTableData'] = $this->MY_Model->getTableData();
        $this->load->view('addTable/addTable', $data);
    }

    //web

    public function insertWeb() {
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => $time,
            'tableNo' => $this->input->post('txtTableNo'),
            'tableCode' => $this->input->post('txtTableCode'),
            'note' => $this->input->post('txtNote'),
            'status' => 'unBooking',
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_addTable', $data);
        $this->session->set_flashdata('adminBackEnd', 'Add Table Done.');
        header("Location: http://hotelsameer.web44.net/AdminDashboard");
    }

       public function updateWeb() {
        $data = array(
           'date' => $this->input->post('date'),
            'tableNo' => $this->input->post('tableNo'),
            'tableCode' => $this->input->post('tableCode'),
            'note' => $this->input->post('note')
       );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_addTable', $data);
        echo 'update';
    }   
    
     public function deleteWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_addTable');
        echo 'Delete Data.';
    }
    
    //Mobile
    
    
     public function getAllTableList() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $query = $this->db->get('tbl_addTable');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['tableNo'] = $row['tableNo'];
                $row_array['tableCode'] = $row['tableCode'];
                $row_array['status'] = $row['status'];

                $vendorName = "";
                $this->db->where('id', $row['vendorId']);
                $query = $this->db->get('tbl_Login');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row1) {
                        $vendorName = $row1['fullName'];
                    }   
                }
                $row_array['vendorName'] = $vendorName;
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getTableList'] = $return_arr;
        echo json_encode($allresult);
    }
    
    public function getAllTableListFree() {   
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->where('status','unBooking');
        $query = $this->db->get('tbl_addTable');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['tableNo'] = $row['tableNo'];
                $row_array['tableCode'] = $row['tableCode'];
                $row_array['status'] = $row['status'];

                $vendorName = "";
                $this->db->where('id', $row['vendorId']);
                $query = $this->db->get('tbl_Login');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row1) {
                        $vendorName = $row1['fullName'];
                    }   
                }
                $row_array['vendorName'] = $vendorName;
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getTableList'] = $return_arr;
        echo json_encode($allresult);
    }
    
     public function getAllTableListFreeBooking() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->where('status','Booking');
        $query = $this->db->get('tbl_addTable');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['tableNo'] = $row['tableNo'];
                $row_array['tableCode'] = $row['tableCode'];
                $row_array['status'] = $row['status'];

                $vendorName = "";
                $this->db->where('id', $row['vendorId']);
                $query = $this->db->get('tbl_Login');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row1) {
                        $vendorName = $row1['fullName'];
                    }   
                }
                $row_array['vendorName'] = $vendorName;
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getTableList'] = $return_arr;
        echo json_encode($allresult);
    }

}
