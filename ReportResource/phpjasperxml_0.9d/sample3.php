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


$PHPJasperXML = new PHPJasperXML();
$PHPJasperXML->debugsql=false;
$PHPJasperXML->arrayParameter=array("parameter1"=>1);
$xml =  simplexml_load_file("sample3.jrxml");
$PHPJasperXML->load_xml_string($xml); //load xml string instead of file

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
