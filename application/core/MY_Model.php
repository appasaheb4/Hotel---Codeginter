<?php

class MY_Model extends CI_Model {

    public function getAdminData() {
        $q = $this->db->get("tbl_Login");
        return $q->result_array();
    }

    public function getAddVendor() {
        $q = $this->db->get("tbl_addvendor");
        return $q->result_array();
    }

    public function getPurchaseAllData() {
        $q = $this->db->get("tbl_purchase");
        return $q->result_array();
    }

    public function getTableData() {
        $q = $this->db->get("tbl_addTable");
        return $q->result_array();
    }

    public function getMenuData() {
        $q = $this->db->get("tbl_AddMenu");
        return $q->result_array();
    }

    public function getSubMenu() {
        $q = $this->db->get("tbl_AddSubMenu");
        return $q->result_array();
    }

    public function getBillingData() {
        $return_arr = array();
        $allresult = array();
        $this->db->where("placeStatus", "Yes");
        $this->db->order_by("id", "desc");
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
                $row_array['userId'] = $row['userId'];
                $waiterName = "";
                $this->db->where("id", $row['userId']);
                $query = $this->db->get('tbl_Login');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row1) {
                        $waiterName = $row1['fullName'];
                    }
                }
                $row_array['waiterName'] = $waiterName;
                $price = 1;
                $totalPrice = 0;
                $this->db->where("tableBookingId", $row['id']);
                $this->db->where("tableNo", $row['tableNo']);
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
                    }
                }
                $totalInsideAmouont = number_format($totalPrice, 2);
                $row_array['price'] = $totalInsideAmouont;
                array_push($return_arr, $row_array);
            }
        }
        return $return_arr;
    }

    public function getExp() {
        $q = $this->db->get("tbl_Expenditure");
        return $q->result_array();
    }

    public function getadminSlider() {
        $q = $this->db->get("tbl_Slider");
        return $q->result_array();
    }

    public function getNoteHome() {
        $q = $this->db->get("tbl_homePageNote");
        return $q->result_array();
    }

    public function reportShow($path) {
        error_reporting(0);
        include('ReportResource/phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
        include("ReportResource/phpjasperxml_0.9d/class/PHPJasperXML.inc.php");
        $server = "localhost";
        $user = "id4179959_hotelsameer";
        $pass = "Aappa@a315144";
        $db = "id4179959_hotelsameer";
        $PHPJasperXML = new PHPJasperXML();
        $PHPJasperXML->debugsql = true;
        //$PHPJasperXML->arrayParameter = array("parameter1" => 1);
        $PHPJasperXML->load_xml_file($path);
        //  $PHPJasperXML->transferDBtoArray($server, $user, $pass, $db);
        $PHPJasperXML->outpage("I");
    }

    public function bottleStockManagement() {
        $q = $this->db->get("tbl_bottleStockManagement");
        return $q->result_array();
    }

    public function bottleStock() {
        $q = $this->db->get("tbl_bottelesStock");
        return $q->result_array();
    }

    public function getProfileData() {
        $this->db->where('id', $this->session->userdata('userId'));
        $q = $this->db->get("tbl_Login");
        return $q->result_array();
    }

    public function getBottleStockDrinkMenu() {
        $this->db->where('menu', 'Drinks');
        $q = $this->db->get("tbl_AddSubMenu");
        return $q->result_array();
    }

    //Total Count
    public function getTotalUserList() {
        $q = $this->db->get("tbl_Login");
        return $q->num_rows();
    }

    public function getTotalFreeTable() {
        $this->db->where('status', 'UnBooking');
        $q = $this->db->get("tbl_addTable");
        return $q->num_rows();
    }

    public function getTotalBookingTable() {
        $this->db->where('status', 'Booking');
        $q = $this->db->get("tbl_addTable");
        return $q->num_rows();
    }

    public function getTotalTodayIncode() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $totalAmount = 0.00;
        $totalAmountTable=0.00;
        $this->db->where("status", "Paid");
        $this->db->where("date", $date);
        $query = $this->db->get('tbl_tableBooking');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $totalAmountTable=floatval(str_replace(',', '', $row['totalAmount']));
                $totalAmount = $totalAmount + $totalAmountTable;
            }
            return $totalAmount;
        } else {
            return $totalAmount;
        }
    }
    
    
    public function getAllBookingData() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->where("placeStatus", "Yes");  
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_tableBooking');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $tableBookingData = $row['id'];
                $row_array['id'] = $tableBookingData;
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                $tableNo = $row['tableNo'];
                $row_array['tableNo'] = $tableNo;
                $tableCode = $row['tableCode'];
                $row_array['tableCode'] = $tableCode;
                $vendorId = $row['userId'];
                $row_array['userId'] = $vendorId;
                $row_array['printStatus'] = $row['printStatus'];


                $return_arr12 = array();
                $allresult12 = array();
                $price = 1;
                $totalPrice = 0;
                $this->db->where("tableBookingId", $tableBookingData);
                $this->db->where("tableNo", $tableNo);
                $this->db->where("tableCode", $tableCode);
                $this->db->where("vendorId", $vendorId);
                $this->db->order_by("incrementId", "desc");
                $query12 = $this->db->get('tbl_addExtraMenu');
                if ($query12->num_rows() > 0) {
                    foreach ($query12->result_array() as $row12) {
                        $row_array12['ExmenuName'] = $row12['menuName'];
                        $row_array12['ExsubMenuName'] = $row12['subMenuName'];
                        $row_array12['ExQty'] = $row12['qty'];

                        $this->db->where("menu", $row12['menuName']);
                        $this->db->where("subMenu", $row12['subMenuName']);
                        $queryP = $this->db->get('tbl_AddSubMenu');
                        if ($queryP->num_rows() > 0) {
                            foreach ($queryP->result_array() as $rowP) {
                                $price = $rowP['price'];
                            }
                        }
                        $totalPrice = $totalPrice + $price * $row12['qty'];


                        array_push($return_arr12, $row_array12);
                    }
                }
                $row_array['extraMenuList'] = $return_arr12;

                $row_array['price'] = number_format($totalPrice, 2);

                $row_array['status'] = $row['status'];
                $waiterName = "";
                $this->db->where("id", $row['userId']);
                $query = $this->db->get('tbl_Login');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $row1) {
                        $waiterName = $row1['fullName'];
                    }
                }
                $row_array['waiterName'] = $waiterName;



                array_push($return_arr, $row_array);
            }
        }
        $allresult['getAllBookingData'] = $return_arr;
         return $return_arr;
    }
    
    

}
