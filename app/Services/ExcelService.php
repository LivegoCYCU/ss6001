<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use App\Imports\OrdersImport;

class ExcelService
{

    // 透過 DI 注入 Repository
    public function __construct()
    {
    }

    public function sortExcelByCollection($excelFile)
    {
        $excelFile = $excelFile[0];
        $excelHeader = $excelFile->shift();
        $excelData = $excelFile->all();
        $excelColumnCount = count($excelHeader);
        $collection = collect([]);
        $sortCollection = collect([]);

        foreach ($excelData as $index => $data) {
            for($i = 0 ; $i <$excelColumnCount ; $i++){
                $sortCollection->put( $excelHeader[$i] , $data[$i]);
            }
            $collection->push($sortCollection);
            $sortCollection = collect([]);
        }
        return ($collection);
    }
}
