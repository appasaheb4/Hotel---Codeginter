<?php

class AdminBilling extends MY_Controller {

    //put your code here
    public function index() {
        $data ['getTableBookingData'] = $this->MY_Model->getBillingData();
        $this->load->view('adminBilling/adminBilling', $data);
    }

    public function updatePaidWeb() {
        $tableNo = $this->input->post('tableNo');
        $tableBookingData = $this->input->post('id');
        $price = 1;
        $totalPrice = 0;
        $this->db->where('tableBookingId', $tableBookingData);
        $this->db->where('tableNo', $tableNo);
        $this->db->order_by('incrementId', 'desc');
        $query12 = $this->db->get('tbl_addExtraMenu');
        if ($query12->num_rows() > 0) {
            foreach ($query12->result_array() as $row12) {   
                $this->db->where("menu", $row12['menuName']);
                $this->db->where("subMenu", $row12['subMenuName']);
                $queryP = $this->db->get('tbl_AddSubMenu');
                if ($queryP->num_rows() > 0) {
                    foreach ($queryP->result_array() as $rowP) {
                        $price = $rowP['price'];
                    }
                }
                $totalPrice = $totalPrice + $price * $row12['qty'];
            }
        }
        $totalInsideAmouont = number_format($totalPrice, 2);
        $dataT = array(
            'status' => 'UnBooking',
        );
        $this->db->where('tableNo', $tableNo);
        $this->db->update('tbl_addTable', $dataT);
        $data = array(
            'status' => 'Paid',
            'totalAmount' => $totalInsideAmouont,
        );
        $this->db->where('id', $tableBookingData);
        $this->db->update('tbl_tableBooking', $data);
        echo 'update';
    }

    public function deleteTableBooking() {
        $id = $this->input->post('id');
        $tableNo = $this->input->post('tableNo');
        if (!empty($id)) {
            $this->db->where('id', $id);
            $this->db->delete('tbl_tableBooking');
            $dataUpdate = array(
                'status' => 'unBooking',
                'vendorId' => ''
            );
            $this->db->where('tableNo', $tableNo);
            $this->db->update('tbl_addTable', $dataUpdate);

//            $this->db->where('tableBookingId', $id);
//            $this->db->delete('tbl_addExtraMenu');
            echo "update";
        } else {
            echo "No";
        }
    }

    public function reportBillingShow() {
        //    $this->MY_Model->reportShow("application/views/adminBilling/adminBilling.jrxml");
    }

}
