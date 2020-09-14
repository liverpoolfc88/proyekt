<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

$array = 0;

class FileController extends Controller
{

    public function upload(Request $request){
//        $result = ['succes'=>true];
//
//        if ($request->fupload){
//            $file = $request->fupload;
//
//            $ext = $file->getClientOriginalExtension();
//            $filename = $file->getClientOriginalName();
//            $mime = $file->getClientMimeType();
//            $size = $file->getClientSize();
//
//            try{
//                $file->move('images',$filename);
//                $newFile = [
//                  'name' => $filename,
//                  'ext' => $ext,
//                  'mime' => $mime,
//                  'size' => $size
//                ];
//                File::create($newFile);
//            } catch (Exeption $e){
//                $result['succes'] = false;
//                $result['error'] = $e->getMessage();
//            }
//        }
//        return response()->json($result);
        return 'saqlandi';
    }


    public function store(Request $request)
    {
        if(isset($_FILES['file'])) {
            if ($_FILES['file']['tmp_name']) {
                if (!$_FILES['file']['error']) {

                    $inputFile = $_FILES['file']['tmp_name'];
                    $extension = strtoupper(pathinfo($inputFile, PATHINFO_EXTENSION));
//                    if ($extension == 'xlsx' || $extension == 'ODS'){

                        //Read spreadsheeet workbook
                        try {
                            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
                            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                            $objPHPExcel = $objReader->load($inputFile);
                        } catch (Exception $e) {
                            die($e->getMessage());
                        }

                        //Get worksheet dimensions
                        $sheet = $objPHPExcel->getSheet(0);
                        $highestRow = $sheet->getHighestRow();
                        $highestColumn = $sheet->getHighestColumn();

                        //Loop through each row of the worksheet in turn
                    $data = [];
                        for ($row = 1; $row <= $highestRow; $row++) {
                            //  Read a row of data into an array
                            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                            //Insert into database
                            $data[] = $rowData;
                        }
//                    } else {
//                        echo "Please upload an XLSX or ODS file";
//                    }
//                    dd($data);
                }
            }
        }
        // unset($data[0]);
        $array = $data;
        return $data;


    }

    public function data(){
        return $array;
    }


    public function storec()
    {
//     $date = Date('y.m.D');
if(isset($_FILES['file'])) {
    if ($_FILES['file']['tmp_name']) {
        if (!$_FILES['file']['error']) {

            $inputFile = $_FILES['file']['tmp_name'];

        // $inputFile = 'uploads/123.xlsx';

//     $inputFile = 'uploads/importDataFromExceel'.$date.'.xlsx';

        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);

            $objPHPExcel = $objReader->load($inputFile);
        } catch (Exception $e) {
            die('Error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $lastColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
        $data = [];
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
            $data[] = $rowData;
            if ($row == 1) {
                continue;
            }


//
//            $vaqtincha = new Excel();
//
//
//
//            $vaqtincha->name = $rowData[0][1];
//            $vaqtincha->country = $rowData[0][2];
//
//
//            $vaqtincha->save();

            // echo ( $rowData[0][0]) .'<br>' ;
            // echo ( $rowData[0][1]) .'<br>' ;
            // echo ( $rowData[0][2]) .'<br>' ;
            // echo ( $rowData[0][3]) .'<br>' ;

//             $vaqtincha = Excel::all();

//             foreach ($vaqtincha as $item) {

// //                echo ($item->name) .'<br>' ;
//             }

        }



        // echo '<hr>';
        // die('<h1 style="color:green">Xammasi ok !!!</h1>');
    }
}
}
return $rowData;
    }

}
