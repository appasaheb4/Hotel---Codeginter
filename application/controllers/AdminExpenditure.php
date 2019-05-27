<?php


class AdminExpenditure extends  MY_Controller {
    //put your code here
    
    public function index(){
        $data ['getExp'] = $this->MY_Model->getExp();
        $this->load->view('adminExpenditure/adminExpenditure',$data);
    }

      public function insertWeb() {
        date_default_timezone_set('Asia/Kolkata');   
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => date("h:i:sa"),
            'expFor' => $this->input->post('txtExpFor'),
            'paidTo' => $this->input->post('txtPaidTo'),
            'amount' => $this->input->post('txtAmount'),
            'payMode' => $this->input->post('selectPaymetMode'),
            'note' => $this->input->post('txtNote'),
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_Expenditure', $data);  
        $this->session->set_flashdata('adminBackEnd', 'Add Exp Data.');  
        header("Location: http://hotelsameer.web44.net/AdminDashboard");
    }
    
    
     public function updateWeb() {
        $data = array(
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'expFor' => $this->input->post('expFor'),
            'paidTo' => $this->input->post('paidTo'),
            'amount' => $this->input->post('amount'),
            'payMode' => $this->input->post('payMode'),
            'note' => $this->input->post('note')
           
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_Expenditure', $data);
        echo 'update';
    }
    
     public function deleteWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_Expenditure');
        echo 'Delete Data.';
    }
    
    
    

    //Mobile
    public function insertMobileData(){
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
         $date = $request->date;
        $expFor = $request->expFor;
        $paidTo = $request->paidTo;
        $amount = $request->amount;
        $payMode = $request->payMode;
        $note = $request->note;
        $userId = $request->userId;
        if (!empty($amount)) {
            $data = array(
                'date' => $date,
                'time' => $time,
                'expFor' => $expFor,
                'paidTo' => $paidTo,
                'amount' => $amount,
                'payMode' => $payMode,
                'note' => $note,
                'userId' => $userId
            );
            $this->db->insert('tbl_Expenditure', $data);
              echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }
    
    
     public function getAllExpData() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_Expenditure');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['expFor'] = $row['expFor'];
                $row_array['paidTo'] = $row['paidTo'];
                $row_array['amount'] = $row['amount'];
                $row_array['payMode'] = $row['payMode'];
                $row_array['note'] = $row['note'];  
                $row_array['userId'] = $row['userId'];
                array_push($return_arr, $row_array);    
            }
        }
        $allresult['addexplist'] = $return_arr;
        echo json_encode($allresult);
    }
    
    
      public function updateMobileData(){
          header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        $date = $request->date;
        $expFor = $request->expFor;
        $paidTo = $request->paidTo;
        $amount = $request->amount;
        $payMode = $request->payMode;
        $note = $request->note;    
        if (!empty($amount)) {
            $data = array(  
               'date' => $date,
                'expFor' => $expFor,
                'paidTo' => $paidTo,
                'amount' => $amount,
                'payMode' => $payMode,
                'note' => $note,
            );
            $this->db->where('id',$id);
            $this->db->update('tbl_Expenditure', $data);
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
            $this->db->delete('tbl_Expenditure');
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }
}
