<?php

class BottelesStock extends MY_Controller {
    //put your code here
    
    public function index(){
        $data ['getStock'] = $this->MY_Model->bottleStock();
        $this->load->view('bottelesStock/bottelesStock',$data);
    }
}
