<?php

class AdminAddPurchase extends MY_Controller {

    public function index() {
        $data ['getAddVendor'] = $this->MY_Model->getAddVendor();
        $data ['getAllPurchaseData'] = $this->MY_Model->getPurchaseAllData();
        $data ['getBottoleStock'] = $this->MY_Model->bottleStockManagement();
        $this->load->view('adminAddPurchase/adminAddPurchase', $data);
    }

    //web

    public function insertWeb() {
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $data = array(
            'date' => $this->input->post('txtDate'),
            'time' => $time,
            'vendorName' => $this->input->post('selectVendor'),
            'contactNo' => $this->input->post('txtContactNo'),
            'panNo' => $this->input->post('txtPanNo'),
            'adharNo' => $this->input->post('txtAdharNo'),
            'gstNo' => $this->input->post('txtGstNo'),
            'proName' => $this->input->post('txtProName'),
            'qty' => $this->input->post('txtQty'),
            'rate' => $this->input->post('txtRate'),
            'price' => $this->input->post('txtPrice'),
            'gstPer' => $this->input->post('txtgstper'),
            'gstAmount' => $this->input->post('txtgstAmount'),
            'totalAmount' => $this->input->post('txtTotalAmt'),
            'note' => $this->input->post('txtNote'),
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_purchase', $data);


        $inc = 4;
        $query = $this->db->query("SELECT `AUTO_INCREMENT` as incre FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'id4179959_hotelsameer' AND   TABLE_NAME   = 'tbl_purchase'");
        foreach ($query->result_array() as $rowIN) {
            $inc = $rowIN['incre'];
        }
        $dataStock = array(
            'date' => $this->input->post('txtDate'),
            'time' => $time,
            'productName' => $this->input->post('txtProName'),
            'qty' => $this->input->post('txtQty'),
            'items' => $this->input->post('txtItmes'),
            'getItmes' => 0,
            'outOf' => $this->input->post('txtItmes'),
            'bottleStockManagementId' => $inc - 1,
            'userId' => $this->session->userdata('userId'),
        );
        $this->db->insert('tbl_bottelesStock', $dataStock);
        $this->session->set_flashdata('adminBackEnd', 'Add Purchase Done.');
        header("Location: http://hotelsameer.web44.net/AdminDashboard");
    }

    public function updateWeb() {
        $data = array(
            'date' => $this->input->post('date'),
            'vendorName' => $this->input->post('vendorName'),
            'contactNo' => $this->input->post('contactNo'),
            'panNo' => $this->input->post('panNo'),
            'adharNo' => $this->input->post('adharNo'),
            'gstNo' => $this->input->post('gstNo'),
            'proName' => $this->input->post('proName'),
            'qty' => $this->input->post('qty'),
            'rate' => $this->input->post('rate'),
            'price' => $this->input->post('price'),
            'gstPer' => $this->input->post('gstPer'),
            'gstAmount' => $this->input->post('gstAmount'),
            'totalAmount' => $this->input->post('totalAmount'),
            'note' => $this->input->post('note'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_purchase', $data);

        echo 'update';
    }

    public function deleteWeb() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('tbl_purchase');

        $this->db->where('bottleStockManagementId', $this->input->post('id'));
        $this->db->delete('tbl_bottelesStock');
        echo 'Delete Data.';
    }

    //Mobile

    public function getVendorWebDatils() {
        $vendorName = $this->input->post('vendorName');
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
        echo json_encode($return_arr);
    }

    public function getVendorWebQtyManagement() {
        $productName = $this->input->post('productName');
        $return_arr = array();
        $allresult = array();
        $this->db->where("productName", $productName);
        $query = $this->db->get('tbl_bottleStockManagement');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['items'] = $row['items'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getQtyManagment'] = $return_arr;
        echo json_encode($return_arr);
    }

    //Mobile
    public function insertMobileData() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");

        $date = $request->date;
        $vendorName = $request->vendorName;
        $contactNo = $request->contactNo;
        $panNo = $request->panNo;
        $adharNo = $request->adharNo;
        $gstNo = $request->gstNo;
        $proName = $request->proName;
        $qty = $request->qty;
        $rate = $request->rate;
        $price = $request->price;
        $gstper = $request->gstper;
        $gstamount = $request->gstamount;
        $total = $request->total;
        $note = $request->note;
        $userId = $request->userId;
        if (!empty($proName)) {
            $data = array(
                'date' => $date,
                'time' => $time,
                'vendorName' => $vendorName,
                'contactNo' => $contactNo,
                'panNo' => $panNo,
                'adharNo' => $adharNo,
                'gstNo' => $gstNo,
                'proName' => $proName,
                'qty' => $qty,
                'rate' => $rate,
                'price' => $price,
                'gstPer' => $gstper,
                'gstAmount' => $gstamount,
                'totalAmount' => $total,
                'note' => $note,
                'userId' => $userId
            );
            $this->db->insert('tbl_purchase', $data);
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    public function getAllPurchaseData() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_purchase');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['vendorName'] = $row['vendorName'];
                $row_array['contactNo'] = $row['contactNo'];
                $row_array['panNo'] = $row['panNo'];
                $row_array['adharNo'] = $row['adharNo'];
                $row_array['gstNo'] = $row['gstNo'];
                $row_array['proName'] = $row['proName'];
                $row_array['qty'] = $row['qty'];
                $row_array['rate'] = $row['rate'];
                $row_array['price'] = $row['price'];
                $row_array['gstPer'] = $row['gstPer'];
                $row_array['gstAmount'] = $row['gstAmount'];
                $row_array['totalAmount'] = $row['totalAmount'];
                $row_array['note'] = $row['note'];
                $row_array['userId'] = $row['userId'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getPurcseAllD'] = $return_arr;
        echo json_encode($allresult);
    }

    public function getAllPurProName() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_purchase');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['submenu'] = $row['proName'];
                $row_array['qty'] = $row['qty'];
                $row_array['userId'] = $row['userId'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getPurcseAllD'] = $return_arr;
        echo json_encode($allresult);
    }

    public function updateMobileData() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        $date = $request->date;
        $vendorName = $request->vendorName;
        $contactNo = $request->contactNo;
        $panNo = $request->panNo;
        $adharNo = $request->adharNo;
        $gstNo = $request->gstNo;
        $proName = $request->proName;
        $qty = $request->qty;
        $rate = $request->rate;
        $price = $request->price;
        $gstper = $request->gstper;
        $gstamount = $request->gstamount;
        $total = $request->total;
        $note = $request->note;
        if (!empty($vendorName)) {
            $data = array(
                'date' => $date,
                'vendorName' => $vendorName,
                'contactNo' => $contactNo,
                'panNo' => $panNo,
                'adharNo' => $adharNo,
                'gstNo' => $gstNo,
                'proName' => $proName,
                'qty' => $qty,
                'rate' => $rate,
                'price' => $price,
                'gstPer' => $gstper,
                'gstAmount' => $gstamount,
                'totalAmount' => $total,
                'note' => $note
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_purchase', $data);
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    public function deleteMobileData() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        if (!empty($id)) {
            $this->db->where('id', $id);
            $this->db->delete('tbl_purchase');
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    public function getQtyManagementDetails() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
         $return_arr = array();
        $allresult = array();
        $menu = $request->menu;
        $this->db->where("productName",$menu);
        $query = $this->db->get('tbl_bottelesStock');
         if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['productName'] = $row['productName'];
                $row_array['qty'] = $row['qty'];
                $row_array['items'] = $row['items'];
                 $row_array['outOf'] = $row['outOf'];
                $row_array['bottleStockManagementId'] = $row['bottleStockManagementId'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getQtyManagementDetails'] = $return_arr;    
        echo json_encode($allresult);
    }

}
