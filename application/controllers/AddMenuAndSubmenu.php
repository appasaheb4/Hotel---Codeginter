<?php

class AddMenuAndSubmenu extends MY_Controller {
    //put your code here
    public function index(){
        $data['getMenuData'] = $this->MY_Model->getMenuData();
         $data['getSubMenuData'] = $this->MY_Model->getSubMenu();
        $this->load->view('addMenuAndSubmenu/addMenuAndSubmenu',$data);
    }
    
    public function insetMenuWeb() {
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => $time,
            'menu' => $this->input->post('txtMenu'),
            'note' => $this->input->post('txtNote'),
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_AddMenu', $data);
        $this->session->set_flashdata('adminBackEnd', 'Add Menu Done.');
        header("Location: http://hotelsameer.web44.net/AdminDashboard");
    }
    
    
    public function insetSubMenuWeb() {
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => $time,
            'menu' => $this->input->post('selectMenu'),
            'subMenu' => $this->input->post('txtSubMenu'),
            'price' => $this->input->post('txtPrice'),
            'note' => $this->input->post('txtNote'),
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_AddSubMenu', $data);
        $this->session->set_flashdata('adminBackEnd', 'Add Menu Done.');
        header("Location: http://hotelsameer.web44.net/AdminDashboard");
    }
    
    
    
     public function updateMenuWeb() {
        $data = array(
           'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'menu' => $this->input->post('menu'),
            'note' => $this->input->post('note')
       );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_AddMenu', $data);
        echo 'update';
    }   
    
     public function deleteMenuWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_AddMenu');
        echo 'Delete Data.';
    }
    
     public function updateSubMenuWeb() {
        $data = array(
           'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'menu' => $this->input->post('menu'),
            'subMenu' => $this->input->post('subMenu'),
            'price' => $this->input->post('price'),
            'note' => $this->input->post('note'),
       );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_AddSubMenu', $data);
        echo 'update';
    }   
    
     public function deleteSubMenuWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_AddSubMenu');
        echo 'Delete Data.';
    }
    
    
    
    
    
    
    
    
    
    //Mobile
    
    public function getAllMenuList() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_AddMenu');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['menu'] = $row['menu'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['menuList'] = $return_arr;
        echo json_encode($allresult);
    }
    
    
    public function getOneMenuSub() {
         header('Access-Control-Allow-Origin: *');
        $postdataNew = file_get_contents("php://input");
        $request = json_decode($postdataNew);
        $menu =$request->menu;
        $return_arr = array();
        $allresult = array();  
        $this->db->where("menu", $menu);
        $query = $this->db->get('tbl_AddSubMenu');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['submenu'] = $row['subMenu'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getSubMenuList'] = $return_arr;
        echo json_encode($allresult);
    }
}
