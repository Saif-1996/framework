<?php

namespace App\Controllers;

use CodeIgniter\HTTP\CURLRequest;
use GuzzleHttp\Client;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\Response;
use App\Controllers\BaseController;

class ExcelController extends BaseController
{


    public function index()
    {
//return print_r($this->request->getVar('sel'));
        $attr = null;


        $char = 'A';
        $count = 2;


        if ($this->request->getVar('sel')) {
            $attr = implode(',', $this->request->getVar('sel'));


        }


        $curl = service('curlrequest');
        $data = $curl->request('GET', 'https://jsonplaceholder.typicode.com/photos', [
            'headers' => [
                'Accept' => 'application/json',
            ], "form_params" => [
                'attribute' => $attr]

        ]);



        $data = json_decode($data->getBody(), true);

        $keys = array_keys($data[0]);

        $file_name = 'data.xlsx';

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $highestColumn = $sheet->getHighestColumn();

        $columnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
//
//echo "<pre>";
//        return print_r($keys);
//        return print_r($data[2]["id"]);

        for ($col = 1; $col <= $columnIndex; $col++) {
            for ($row = 1; $row <= count($data); $row++) {

                //               convert index as a number to  a char

                $cell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col) . $row;
////              **************

                if ($row==1){
//                      $value = "row $cell"; // Replace with your own value
                    $colName=$keys[$col-1];
                   $colName= strtoupper($colName);
                      $sheet->setCellValue($cell, $colName);
                  }
                else{
//                    $value = "row $cell"; // Replace with your own value
                    $attribute=$keys[$col-1];
                    $sheet->setCellValue($cell, $data[$row-1][$attribute]);
                }


            }
//            for to col
            if ($columnIndex < count($keys) ) {
                $columnIndex++;
            }

        }


        $writer = new Xlsx($spreadsheet);

        $writer->save($file_name);

        header("Content-Type: application/vnd.ms-excel");

        header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

        header('Expires: 0');

        header('Cache-Control: must-revalidate');

        header('Pragma: public');

        header('Content-Length:' . filesize($file_name));

        flush();

        readfile($file_name);

        exit;
    }

    public function viewExport()
    {
        return view('export');
    }
}