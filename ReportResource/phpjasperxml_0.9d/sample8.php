<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('class/tcpdf/tcpdf.php');
include_once("class/PHPJasperXML.inc.php");
include_once ('setting.php');

 $server = "sql101.byethost7.com";
        $user = "b7_20663510";
        $pass = "Aappa@a315144";
        $db = "b7_20663510_zpschoollavang";



$PHPJasperXML = new PHPJasperXML("en");
//$PHPJasperXML->debugsql=false;
$PHPJasperXML->arrayParameter=array("parameter1"=>1);
$PHPJasperXML->load_xml_file("sample8.jrxml");
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);

$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
