<?php

class UserList extends MY_Controller {
    public function index(){
        $data ['getUserData'] = $this->MY_Model->getAdminData();
        $this->load->view('userList/index', $data);
    }
       
    public function updateWeb() {
        $data = array(
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'fullName' => $this->input->post('fullName'),
            'mobileNo' => $this->input->post('mobileNo'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'type' => $this->input->post('type'),
            'status' => $this->input->post('status')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_Login', $data);
        echo 'update';  
    }   

    public function deleteWeb() {   
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_Login');
        echo 'Delete Data.';
    }
    
    public function excel() {
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require (APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                ->setCreator("Kumar sir .")
                ->setLastModifiedBy("")
                ->setTitle("User List")
                ->setSubject("")
                ->setDescription("appasaheb lakade (full stack developer)");
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', "Date");
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', "Time");
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', "Name");
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', "Mobile Number");
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', "Email");
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', "Address");
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', "Area");
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', "City");
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', "PinCode");
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', "State");
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', "Country");
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', "Login Count");
        $rowNo = 2;  
        $data['getAdminAddClass'] = $this->MY_Model->getUserData();
        foreach ($data['getAdminAddClass'] as $row) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowNo, $row['date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowNo, $row['time']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowNo, $row['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowNo, $row['mobileNo']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowNo, $row['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowNo, $row['address']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowNo, $row['area']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowNo, $row['city']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowNo, $row['pin']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowNo, $row['state']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowNo, $row['country']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowNo, $row['loginCont']);
            $rowNo++;
        }
        $filename = "User List  " . date("Y-m-d H-i-s") . '.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("User List");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
    
}
