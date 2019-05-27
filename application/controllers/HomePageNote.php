<?php


class HomePageNote extends my_Controller {
    //put your code here
    
    public function index(){
        $data['getNote'] = $this->MY_Model->getNoteHome();
        $this->load->view('homePageNote/homePageNote',$data);
    }
    
    public function updateWeb() {
        $data = array(   
            'note' => $this->input->post('note')
       );
        $this->db->where('id', 1);
        $this->db->update('tbl_homePageNote', $data);
        echo 'update';
    } 
}
