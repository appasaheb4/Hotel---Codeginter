<?php

class TableBooking extends MY_Controller {

//put your code here
//Mobile 


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
        echo json_encode($allresult);
    }
    
    
    
     public function getAllBookingKitechenData() {
        header('Access-Control-Allow-Origin: *');
        $request = file_get_contents('php://input');
        $input = json_decode($request, true);
        $return_arr = array();
        $allresult = array();
        $this->db->where("placeStatus", "Yes"); 
        $this->db->where("kitchenStatus", "No");     
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
        echo json_encode($allresult);
    }
    

    public function tableBookingMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $id = $request->id;
        $date = $request->date;
        $tableNo = $request->tableNo;
        $tableCode = $request->tableCode;
        $menuName = $request->menuName;
        $subMenuName = $request->subMenuName;
        $qty = $request->qty;
        $userId = $request->userId;
        if (!empty($menuName)) {
            $data = array(
                'date' => $date,
                'time' => $time,
                'tableNo' => $tableNo,
                'tableCode' => $tableCode,
                'menuName' => $menuName,
                'subMenuName' => $subMenuName,
                'qty' => $qty,
                'status' => 'UnPaid',
                'printStatus' => 'No',
                'placeStatus' => 'No',
                'kitchenStatus' => 'No',
                'userId' => $userId
            );
            $this->db->insert('tbl_tableBooking', $data);
            $dataUpdate = array(
                'status' => 'Booking',
                'vendorId' => $userId
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_addTable', $dataUpdate);
            $inc = 4;
            $query = $this->db->query("SELECT `AUTO_INCREMENT` as incre FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'id4179959_hotelsameer' AND   TABLE_NAME   = 'tbl_tableBooking'");
            foreach ($query->result_array() as $rowIN) {
                $inc = $rowIN['incre'];
            }
            $dataExtra = array(
                'tableBookingId' => $inc - 1,
                'incrementId' => 1,
                'date' => $date,
                'time' => $time,
                'tableNo' => $tableNo,
                'tableCode' => $tableCode,
                'menuName' => $menuName,
                'subMenuName' => $subMenuName,
                'qty' => $qty,
                'vendorId' => $userId
            );
            $this->db->insert('tbl_addExtraMenu', $dataExtra);

            if ($menuName == "Drinks") {
                $qtyL = 1;
                $itemsL = 1;
                $remaingItem = 1;
                $totalItems = 1;

                $remaingQty = 1;
                $roundOff = 1.0;
                $roundOffNew = 1;
                $rotalItemRaming = 1;
                $localID = 1;
                $newTotalNewmainItem = 0;
                $this->db->where("productName", $subMenuName);
                $query = $this->db->get('tbl_bottelesStock');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $rowss) {
                        $localID = $rowss['id'];
                        $qtyL = $rowss['qty'];
                        $itemsL = $rowss['items'];
                        $newTotalNewmainItem = $rowss['getItmes'];
                        $dataUpdateStock = array(
                            'getItmes' => $newTotalNewmainItem + $qty,
                        );
                        $this->db->where('id', $localID);
                        $this->db->update('tbl_bottelesStock', $dataUpdateStock);
                        if ($qty <= $itemsL) {
                            $itemsL = $itemsL - $qty;
                            $dataUpdatess = array(
                                'items' => $itemsL,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);
                        } else if ($itemsL==0) {
                           $rotalItemRaming =$rowss['outOf']-$qty;
                            $dataUpdatess = array(
                                'qty' => $qtyL-1,
                                'items' => $rotalItemRaming,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);
                        }else if($qty>$itemsL){
                            $dataUpdatess = array(
                                'qty' => $qtyL-1,  
                                'items' => ($rowss['outOf']+$itemsL)-$qty,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);  
                            
                        }
                        else {
                            $itemsL = $itemsL - $qty;
                            $dataUpdatess = array(
                                'items' => $itemsL,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);
                        }
                    }
                }
            }
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    public function addExtraMenuItem() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $time = date("h:i:sa");
        $id = $request->id;
        $maxValue = $request->maxValue;
        $date = $request->date;
        $tableNo = $request->tableNo;
        $tableCode = $request->tableCode;
        $menuName = $request->menuName;
        $subMenuName = $request->subMenuName;
        $qty = $request->qty;
        $userId = $request->userId;
        if (!empty($menuName)) {
            $data = array(
                'tableBookingId' => $id,
                'incrementId' => $maxValue,
                'date' => $date,
                'time' => $time,
                'tableNo' => $tableNo,
                'tableCode' => $tableCode,
                'menuName' => $menuName,
                'subMenuName' => $subMenuName,
                'qty' => $qty,
                'vendorId' => $userId
            );

            $this->db->insert('tbl_addExtraMenu', $data);
            
             if ($menuName == "Drinks") {
                $qtyL = 1;
                $itemsL = 1;
                $remaingItem = 1;
                $totalItems = 1;

                $remaingQty = 1;
                $roundOff = 1.0;
                $roundOffNew = 1;
                $rotalItemRaming = 1;
                $localID = 1;   
                $newTotalNewmainItem = 0;
                $this->db->where("productName", $subMenuName);
                $query = $this->db->get('tbl_bottelesStock');
                if ($query->num_rows() > 0) {
                    foreach ($query->result_array() as $rowss) {
                        $localID = $rowss['id'];
                        $qtyL = $rowss['qty'];   
                        $itemsL = $rowss['items'];
                        $newTotalNewmainItem = $rowss['getItmes'];
                        $dataUpdateStock = array(
                            'getItmes' => $newTotalNewmainItem + $qty,
                        );
                        $this->db->where('id', $localID);
                        $this->db->update('tbl_bottelesStock', $dataUpdateStock);
                        if ($qty <= $itemsL) {
                            $itemsL = $itemsL - $qty;
                            $dataUpdatess = array(
                                'items' => $itemsL,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);
                        } else if ($itemsL==0) {
                           $rotalItemRaming =$rowss['outOf']-$qty;
                            $dataUpdatess = array(
                                'qty' => $qtyL-1,
                                'items' => $rotalItemRaming,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);
                        }else if($qty>$itemsL){
                            $dataUpdatess = array(
                                'qty' => $qtyL-1,  
                                'items' => ($rowss['outOf']+$itemsL)-$qty,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);  
                            
                        }
                        else {
                            $itemsL = $itemsL - $qty;
                            $dataUpdatess = array(
                                'items' => $itemsL,
                            );
                            $this->db->where('id', $localID);
                            $this->db->update('tbl_bottelesStock', $dataUpdatess);
                        }
                    }
                }
            }
            
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }

    public function getUserWiseBookingData() {
        header('Access-Control-Allow-Origin: *');
        $postdataNew = file_get_contents("php://input");
        $request = json_decode($postdataNew);
        $userId =$request->userId;
        $return_arr = array();
        $allresult = array();
        $this->db->where("userId", $userId);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_tableBooking');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $bookingId = $row['id'];
                $row_array['id'] = $bookingId;
                $row_array['date'] = $row['date'];
                $row_array['time'] = $row['time'];
                
                $row_array['placeStatus'] = $row['placeStatus'];
                $row_array['kitchenStatus'] = $row['kitchenStatus'];
                $tableNoLocal = $row['tableNo'];
                $row_array['tableNo'] = $tableNoLocal;
                $tableCode = $row['tableCode'];
                $row_array['tableCode'] = $tableCode;
                

                $return_arr12 = array();
                $allresult12 = array();
                $this->db->where("tableBookingId", $bookingId);
                $this->db->where("tableNo", $tableNoLocal);
                $this->db->where("tableCode", $tableCode);
                $this->db->where("vendorId", $userId);
                $this->db->order_by("incrementId", "desc");
                $query12 = $this->db->get('tbl_addExtraMenu');
                if ($query12->num_rows() > 0) {
                    foreach ($query12->result_array() as $row12) {
                        $row_array12['id'] = $row12['id'];    
                        $row_array12['ExmenuName'] = $row12['menuName'];
                        $row_array12['ExsubMenuName'] = $row12['subMenuName'];
                        $row_array12['ExQty'] = $row12['qty'];
                        array_push($return_arr12, $row_array12);
                    }
                }
                $row_array['extraMenuList'] = $return_arr12;

                $maxValue = "";
                $query44 = $this->db->query("select *  from tbl_addExtraMenu where tableBookingId=$bookingId AND tableNo='$tableNoLocal' AND tableCode='$tableCode' AND vendorId=$userId ORDER BY incrementId DESC LIMIT 1;");
                foreach ($query44->result_array() as $rowIN) {
                    $maxValue = $rowIN['incrementId'];
                }


                $row_array['maxValue'] = $maxValue + 1;

// $row_array['menuName'] =//                $row_array['menuName'] = $row['menuName'];
//                $row_array['subMenuName'] = $row['subMenuName'];
//                $row_array['qty'] = $row['qty'];

                $row_array['status'] = $row['status'];
                array_push($return_arr, $row_array);
            }
        }
        $allresult['getBookingData'] = $return_arr;
        echo json_encode($allresult);
    }

    public function deleteTableBooking() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        $tableNo = $request->tableNo;
        if (!empty($id)) {
            $this->db->where('id', $id);
            $this->db->delete('tbl_tableBooking');
            $dataUpdate = array(
                'status' => 'UnBooking',
                'vendorId' => ''
            );
            $this->db->where('tableNo', $tableNo);
            $this->db->update('tbl_addTable', $dataUpdate);

//            $this->db->where('tableBookingId', $id);
//            $this->db->delete('tbl_addExtraMenu');

            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }
    
    
     public function deleteExtraMenuMobile() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        $this->db->where('id', $id);
        $this->db->delete('tbl_addExtraMenu');
         echo json_encode("yes");   
    }

    public function adminPaidAmount() {
        header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        $tableNo = $request->tableNo;
        $paidAmountWeb = $request->paidAmountWeb;    
        $dataT = array(
            'status' => 'UnBooking',
        );
        $this->db->where('tableNo', $tableNo);   
        $this->db->update('tbl_addTable', $dataT);
        
        
        if (!empty($id)) {    
            $dataUpdate = array(
                'status' => 'Paid',
                'totalAmount' =>$paidAmountWeb,
            );
            $this->db->where('id', $id);
            $this->db->update('tbl_tableBooking', $dataUpdate);
            echo json_encode("yes");   
        } else {
            echo json_encode("no");
        }
    }
    
     public function placeOrderMobile(){
          header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;
        if (!empty($id)) {
            $data = array(
                'placeStatus' => 'Yes',
            );
            $this->db->where('id',$id);
            $this->db->update('tbl_tableBooking', $data);
            echo json_encode("yes");
        } else {
            echo json_encode("no");
        }
    }
    
     public function removeKitenOrder(){
          header('Access-Control-Allow-Origin: *');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        date_default_timezone_set('Asia/Kolkata');
        $id = $request->id;    
        if (!empty($id)) {
            $data = array(
                'kitchenStatus' => 'Yes',
            );
            $this->db->where('id',$id);
            $this->db->update('tbl_tableBooking', $data);
            echo json_encode("yes");   
        } else {
            echo json_encode("no");
        }
    }

}
