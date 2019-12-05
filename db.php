<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
$spreadsheet = $reader->load("subset.csv");
$worksheet = $spreadsheet->getActiveSheet();

echo "INSERT INTO `occurrences` (DATE_OF_OCCURRENCE, TIME_OF_OCCURRENCE, BOROUGH, ZIP_CODE, LATITUDE, LONGITUDE, LOCATION, ON_STREET_NAME, CROSS_STREET_NAME, OFF_STREET_NAME, NUMBER_OF_PERSONS_INJURED, NUMBER_OF_PERSONS_KILLED, NUMBER_OF_PEDESTRIANS_INJURED, NUMBER_OF_PEDESTRIANS_KILLED, NUMBER_OF_CYCLIST_INJURED, NUMBER_OF_CYCLIST_KILLED, NUMBER_OF_MOTORIST_INJURED, NUMBER_OF_MOTORIST_KILLED, CONTRIBUTING_FACTOR_VEHICLE_1, CONTRIBUTING_FACTOR_VEHICLE_2, CONTRIBUTING_FACTOR_VEHICLE_3, CONTRIBUTING_FACTOR_VEHICLE_4, CONTRIBUTING_FACTOR_VEHICLE_5, UNIQUE_KEY, VEHICLE_TYPE_CODE_1, VEHICLE_TYPE_CODE_2, VEHICLE_TYPE_CODE_3, VEHICLE_TYPE_CODE_4, VEHICLE_TYPE_CODE_5) VALUES" . '<br><br>';


foreach ($worksheet->getRowIterator() as $row) {
    echo '(';

    $iterator = 1;
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); 
    foreach ($cellIterator as $cell) {
    	
        if($iterator == 1) {
            echo '"' . (new \Carbon\Carbon($cell->getValue()))->toDateString() . '", ';
        } else if($iterator == 2) {
            echo '"' . $cell->getValue() . '", ';
        } else if(empty($cell->getValue())) {
    		echo 'NULL' . (($iterator != 29)? ", " : "");
    	} else if(is_numeric($cell->getValue()))
    		echo $cell->getValue() . (($iterator != 29)? ", " : "");	
    	else {
    		echo "'" . $cell->getValue() . (($iterator != 29)? "', " : "'");	
    	}

        $iterator++;
    }

    echo '),<br>';
}
echo ';';