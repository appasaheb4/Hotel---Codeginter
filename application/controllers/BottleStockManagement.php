<?php


class BottleStockManagement extends MY_Controller {
    //put your code here
    
    public function index(){
         $data ['getBottoleStock'] = $this->MY_Model->bottleStockManagement();
         $data ['getBottleMenuName'] = $this->MY_Model->getBottleStockDrinkMenu();
        $this->load->view('bottleStockManagement/bottleStockManagement',$data);
    }      
    
     public function insertWeb() {
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => $time,
            'productName' => $this->input->post('txtProductName'),
            'items' => $this->input->post('txtItem'),
            'note' => $this->input->post('txtNote'),
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_bottleStockManagement', $data);
        $this->session->set_flashdata('adminBackEnd', 'Qty Management Added.');
        header("Location: http://hotelsameer.web44.net/AdminDashboard");
    }
    
     public function updateWeb() {
        $data = array(
           'date' => $this->input->post('date'),
            'productName' => $this->input->post('productName'),
            'items' => $this->input->post('items'),
            'note' => $this->input->post('note')
       );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_bottleStockManagement', $data);
        echo 'update';
    }   
    
     public function deleteWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_bottleStockManagement');
        echo 'Delete Data.';
    }
}
