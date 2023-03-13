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


        $file_name = 'data.xlsx';

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $char = 'A';
        $count = 2;


        if ($this->request->getVar('sel')) {
            $attr = implode(',', $this->request->getVar('sel'));

            foreach ($this->request->getVar('sel') as $value) {
//            $newChar = chr(ord($char) + 1);
                $sheet->setCellValue(''.$char.'1', $value);
                $char++;

            }

        }


        $curl = service('curlrequest');
        $data = $curl->request('GET', 'http://localhost/project-root/public/api/students', [
            'headers' => [
                'Accept' => 'application/json',
            ],
            "form_params" => [
                'attribute' => $attr]
        ]);

//        $employee_object = new Student();

//$data=json_decode($data);
//        $data = $employee_object->findAll();


//        return print_r($data[1]);



//        $sheet->setCellValue('A1', ' id');
//
//        $sheet->setCellValue('B1', 'name');
//
//        $sheet->setCellValue('C1', 'Email.');

//        $sheet->setCellValue('D1', 'Department');


        foreach ($data as $row) {
            $sheet->setCellValue('A' . $count, $row['id']);

            $sheet->setCellValue('B' . $count, $row['name']);
            $sheet->setCellValue('C' . $count, $row['email']);


            $count++;
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
