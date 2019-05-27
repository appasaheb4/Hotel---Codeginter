<?php

class AdminAddSlider extends MY_Controller {

    public function index() {
        $data['getalldataSlider'] = $this->MY_Model->getadminSlider();
        $this->load->view('adminAddslider/index', $data);
    }   
    
    
     public function insertWeb() {
          date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['fileImageName']['name']);
        $config['upload_path'] = 'Content/WebImages/AddSlider/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $config['file_name'] = $new_image_name;
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['$min_width'] = '0';
        $config['min_height'] = '0';
        $this->load->library('upload', $config);
        $upload = $this->upload->do_upload('fileImageName');
        if ($upload != NULL) {
            $data = array(
                'date' => $this->input->post('txtDate'),
                'time' => $time,
                'note' => $this->input->post('txtNote'),
                'imagePath' => 'Content/WebImages/AddSlider/' . time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['fileImageName']['name']),
                'userId' => $this->session->userdata('userId')
            );
            $this->db->insert('tbl_Slider', $data);
            $this->session->set_flashdata('adminBackEnd', 'Slider Add Done.');
            header("Location: http://hotelsameer.web44.net/AdminDashboard");
        } else {
            echo 'Error';
        }
    }

    public function updateWeb() {
        $data = array(    
            'date' => $this->input->post('date'),
            'note' => $this->input->post('note')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_Slider', $data);   
        echo 'update';
    }

    public function deleteWeb() {  
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_Slider');   
        echo 'Delete Data.';
    }

    public function reportClassList() {
        $this->MY_Model->reportShow("application/views/adminAddSlider/AdminAddSliderAllData.jrxml");
    }

    public function excel() {
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                ->setCreator("")
                ->setLastModifiedBy("")
                ->setTitle("")
                ->setSubject("")
                ->setDescription("");
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Date");
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', "Slider Content");
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', "Note");
        $rowNo = 2;
        $data['getSliderExcel'] = $this->MY_Model->getAdminAddSlider();
        foreach ($data['getSliderExcel'] as $row) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowNo, $row['date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowNo, $row['sliderContent']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowNo, $row['note']);
            $rowNo++;
        }
        $filename = "Slider List  " . date("Y-m-d H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Class List");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
        
    

}
