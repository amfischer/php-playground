<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');

// $file = __DIR__ . '/../static/drsha-gmaps.csv';
// $csv = new Csv;
// $csv->load($file);
// var_dump(gettype($csv), $csv->listWorksheetInfo($file));

$file = __DIR__ . '/../static/maps-data.json';
$json = json_decode(file_get_contents($file));
foreach ($json->markers as $marker) {
    if (stripos( $marker->title, 'Tao Hands' ) !== false) {
        $marker->category = "1";
    }
    else if (stripos( $marker->title, 'Tao Soul Tao Dance' ) !== false) {
        $marker->category = "4";
    }
    else if (stripos( $marker->title, 'Tao Chang' ) !== false) {
        $marker->category = "5";
    }
    else if (stripos( $marker->title, 'Guan Yin Lineage' ) !== false) {
        $marker->category = "2";
    }
}

// var_dump($json->markers[1000]->title, $json->markers[1000]->category);

file_put_contents(__DIR__ . '/../static/updated-data.json', json_encode($json));
echo "complete";