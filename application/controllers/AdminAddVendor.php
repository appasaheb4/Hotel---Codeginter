<?php

class AdminAddVendor extends MY_Controller {
    //put your code here
    
    public function index(){
         $data ['getAddVendor'] = $this->MY_Model->getAddVendor();
        $this->load->view('adminAddVendor/adminAddVendor',$data);
    }

//Web
    
     public function insertWeb() {
        date_default_timezone_set('Asia/Kolkata');
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => date("h:i:sa"),
            'vendorName' => $this->input->post('txtVendroName'),
            'address' => $this->input->post('txtAddress'),
            'contactNo' => $this->input->post('txtContactNo'),
            'email' => $this->input->post('txtPhone2'),
            'pancardNo' => $this->input->post('txtPanNo'),
            'adharNo' => $this->input->post('txtAdharNo'),
            'gstNo' => $this->input->post('txtGstNo'),
            'note' => $this->input->post('txtNote'),
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_addvendor', $data);
        $this->session->set_flashdata('adminBackEnd', 'AddVendor Done.');  
        header("Location: http://hotelsameer.web44.net/AdminDashboard");
    }

     public function updateWeb() {
        $data = array(
           'date' => $this->input->post('txtDate'),
            'time' => date("h:i:sa"),
            'vendorName' => $this->input->post('vendorName'),
            'address' => $this->input->post('address'),
            'contactNo' => $this->input->post('contactNo'),
            'email' => $this->input->post('email'),
            'pancardNo' => $this->input->post('pancardNo'),
            'adharNo' => $this->input->post('adharNo'),
            'gstNo' => $this->input->post('gstNo'),
            'note' => $this->input->post('note'),
           
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_addvendor', $data);
        echo 'update';
    }   
    
     public function deleteWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_addvendor');
        echo 'Delete Data.';
    }
    

//Mobile
    public function insertMobileData(){
          header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $datelocal = date("Y-m-d");
        $time = date("h:i:sa");
         $date = $request->date;
        $vendorName = $request->vendorName;
        $address = $request->address;
        $contactNo = $request->contactNo;
        $email = $request->email;
        $panNo = $request->panNo;
        $adharNo = $request->adharNo;
        $gstNo = $request->gstNo;
        $note = $request->note;
        $userId = $request->userId;
        if (!empty($vendorName)) {
            $data = array(
                'date' => $date,
                'time' => $time,
                'vendorName' => $vendorName,
                'address' => $address,
                'contactNo' => $contactNo,
                'email' => $email,
                'pancardNo' => $panNo,
                'adharNo' => $adharNo,
                'gstNo' => $gstNo,
                'note' => $note,
                'userId' => $userId
            );
            echo json_encode("yes");
            $this->db->insert('tbl_addvendor', $data);
        } else {
            echo json_encode("no");
        }
    }
    
    
    
     public function updateMobileData(){
          header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        $date = $request->date;
        $vendorName = $request->vendorName;
        $address = $request->address;
        $contactNo = $request->contactNo;
        $email = $request->email;
        $panNo = $request->panNo;
        $adharNo = $request->adharNo;
        $gstNo = $request->gstNo;
        $note = $request->note;
        if (!empty($vendorName)) {
            $data = array(
                'date' => $date,
                'vendorName' => $vendorName,
                'address' => $address,
                'contactNo' => $contactNo,
                'email' => $email,
                'pancardNo' => $panNo,
                'adharNo' => $adharNo,
                'gstNo' => $gstNo,
                'note' => $note
            );
            $this->db->where('id',$id);
            $this->db->update('tbl_addvendor', $data);
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }
    
    
    public function deleteMobileData(){
          header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        if (!empty($id)) {  
            $this->db->where('id',$id);
            $this->db->delete('tbl_addvendor');
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }
    
    
     public function getAllVendorData() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_addvendor');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['vendorName'] = $row['vendorName'];
                $row_array['address'] = $row['address'];
                $row_array['contactNo'] = $row['contactNo'];
                $row_array['email'] = $row['email'];
                $row_array['pancardNo'] = $row['pancardNo'];
                $row_array['adharNo'] = $row['adharNo'];
                $row_array['gstNo'] = $row['gstNo'];
                $row_array['note'] = $row['note'];  
                $row_array['userId'] = $row['userId'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['addvendorlist'] = $return_arr;
        echo json_encode($allresult);
    }
    
    
    public function getOneVendorDa() {
         header('Access-Control-Allow-Origin: *');
        $postdataNew = file_get_contents("php://input");
        $request = json_decode($postdataNew);
        $vendorName =$request->vendorName;
        $return_arr = array();
        $allresult = array();  
        $this->db->where("vendorName", $vendorName);
        $query = $this->db->get('tbl_addvendor');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];  
                $row_array['vendorName'] = $row['vendorName'];
                $row_array['contactNo'] = $row['contactNo'];
                $row_array['pancardNo'] = $row['pancardNo'];
                $row_array['adharNo'] = $row['adharNo'];
                $row_array['gstNo'] = $row['gstNo'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getVendorDatils'] = $return_arr;
        echo json_encode($allresult);
    }
    
    
    
    
}
