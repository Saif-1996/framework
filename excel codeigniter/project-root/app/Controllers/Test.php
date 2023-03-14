<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Student;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Test extends BaseController
{
    function getUserDetails(){
        $stu = new Student();
        $response = array();
//
//        $this->db->select('username,name,gender,email');
//        $q = $this->db->get('users');
        $stu=$stu->findAll();
        $response = $stu;
//        return $response;

    }

    public function  test(){

        $file_name = 'data.xlsx';

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $highestColumn = $sheet->getHighestColumn();

        print_r($highestColumn);
        $array = array('id' => 'value1', 'id2' => 'value1', 'i1d' => 'value1', 'i4d' => 'value1', 'key2' => 'value2');

        $keys = array_keys($array);
//        print_r($array);
        echo count($keys);
        print_r($keys);
//
//        for($i=0; $i < count($keys); ++$i) {
//            echo $keys[$i] . ' ' . $array[$keys[$i]] . "\n";
//        }
    }



    public function toExcel()
    {
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        /* get data */
        $usersData = $this->getUserDetails();
        /* file creation */
        return print_r($usersData);
        die();
        $file = fopen('php:/* output', 'w');

        $header = array("Username", "Name", "Gender", "Email");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
}
