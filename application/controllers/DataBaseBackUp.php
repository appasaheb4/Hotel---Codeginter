<?php

class DataBaseBackUp extends MY_Controller {
    public function getBackup() {
        $date = date('Y-m-d');
        $this->load->dbutil();
        $backup = $this->dbutil->backup();
        $this->load->helper('file');
        write_file('Content/BackUp/HotelSameer_' . $date . '.sql.zip', $backup);
        force_download('Content/BackUp/HotelSameer_' . $date . '.sql.zip', NULL);
      }         
}
