<?php

class Home extends MY_Controller {
    //put your code here
    
    public function index(){
        $data['getalldataSlider'] = $this->MY_Model->getadminSlider();
         $data['getNote'] = $this->MY_Model->getNoteHome();
        $this->load->view('home/home',$data);
    }
    
    
    public function contactSentEmail(){  
                 $name = $this->input->post('txtConName');
                 $email = $this->input->post('txtConEmail');
                 $message = $this->input->post('txtConMessage');
                 $message = wordwrap($message, 70);   
                 mail("onlyappasaheb4@gmail.com", "Hotel Silver Oak(Contact)", "Name: ".$name ."\n". "Email: ". $email ."\n".'Message: '.$message);
                 $this->session->set_flashdata('adminBackEnd', 'Sent Email.');
                 header("Location: http://hotelsameer.web44.net");
        
    }
    
    public function subcriber(){
          $email = $this->input->post('txtConEmail');
           mail("onlyappasaheb4@gmail.com", "Hotel Silver Oak(Subscribe)","Email: ". $email);
              $this->session->set_flashdata('adminBackEnd', 'Sent Email.');
                 header("Location: http://hotelsameer.web44.net");
    }
}
