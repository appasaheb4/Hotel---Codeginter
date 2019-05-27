<?php

class AdminBillingPrint extends MY_Controller {

    //put your code here



    public function index() {
        $this->load->view('adminBillingPrint/adminBillingPrint');
    }

    //Mobile


    public function printDataShow() {
       header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $tableBookingData =$request->tableBookingData;
        $return_arr = array();
        $allresult = array();
        $this->db->where("id", $tableBookingData);   
        $query = $this->db->get('tbl_tableBooking');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {

                $idDP = "";
                $dateDP = "";
                $timeDP = "";
                $this->db->where("tableBookingId", $tableBookingData);
                $queryDP = $this->db->get('tbl_printData');
                if ($queryDP->num_rows() > 0) {
                    foreach ($queryDP->result_array() as $rowDP) {
                        $idDP = $rowDP['id'];
                        $dateDP = $rowDP['date'];
                        $timeDP = $rowDP['time'];
                    }
                }
                $row_array['idDP'] = $idDP;
                $row_array['dateDP'] = $dateDP;
                $row_array['timeDP'] = $timeDP;
                
                $return_arr12 = array();
                $allresult12 = array();
                $price = 1;
                $totalPrice = 0;
                $totalQty=0;
                
                $this->db->where("tableBookingId", $tableBookingData);
                $this->db->where("tableNo", $row['tableNo']);
                $this->db->where("tableCode", $row['tableCode']);
                $this->db->where("vendorId", $row['userId']);
                $this->db->order_by("incrementId", "desc");
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
                        $row_array12['ExmenuName'] = $row12['menuName'];
                        $row_array12['ExsubMenuName'] = $row12['subMenuName'];
                        $row_array12['ExQty'] = $row12['qty'];
                        $row_array12['ExPrice'] = $price;
                        $row_array12['ExTotalAmount'] =$price * $row12['qty'];
                       
                        
                        $totalQty=$totalQty+1;
                        
                        array_push($return_arr12, $row_array12);
                    }
                }
                $row_array['extraMenuList'] = $return_arr12;
                $row_array['extralTotalItem'] = $totalQty;
                $row_array['price'] = number_format($totalPrice, 2);
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getPrintDataPrintWise'] = $return_arr;
        echo json_encode($allresult);
    }

    public function insertPrintData() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $datelocal = date("Y-m-d");
        $time = date("h:i:sa");
        $tableBookingId = $request->tableBookingId;
        $userId = $request->userId;
        if (!empty($tableBookingId)) {
            $data = array(
                'date' => $datelocal,
                'time' => $time,
                'tableBookingId' => $tableBookingId,
                'userId' => $userId
            );


            $inc = 4;
            $query = $this->db->query("SELECT `AUTO_INCREMENT` as incre FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'id4179959_hotelsameer' AND   TABLE_NAME   = 'tbl_printData'");
            foreach ($query->result_array() as $rowIN) {
                $inc = $rowIN['incre'];
            }
            $this->db->insert('tbl_printData', $data);
            $dataUpdate = array(
                'printStatus' => 'Yes',
                'printId' => $inc
            );
            $this->db->where('id', $tableBookingId);
            $this->db->update('tbl_tableBooking', $dataUpdate);
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    //Mobile Function
    public function printMobileData() {
        header('Access-Control-Allow-Origin: *');
        $postdataNew = file_get_contents("php://input");
        $request = json_decode($postdataNew);
        $id = $request->id;
        $return_arr = array();
        $allresult = array();
        $this->db->where("id", $id);
        $query = $this->db->get('tbl_tableBooking');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $row_array['tableNo'] = $row['tableNo'];
                $row_array['tableCode'] = $row['tableCode'];
                $row_array['menuName'] = $row['menuName'];
                $row_array['subMenuName'] = $row['subMenuName'];
                $row_array['qty'] = $row['qty'];
                $row_array['status'] = $row['status'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getPrintData'] = $return_arr;
        echo json_encode($allresult);
    }

}
