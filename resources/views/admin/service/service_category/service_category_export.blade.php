 
 <?php
 /*
$query = \App\Models\ServiceCategory::get(); // Get data from Database from demo table
 
 
    $delimiter = ",";
    // $filename = "loaner_details_list_excel_" . date('d-M-Y') . ".csv"; // Create file name
    $filename = "loaner_details_list_excel_" . date('d-M-Y') . ".xls"; // Create file name
     
    //create a file pointer
    $f = fopen('php://memory', 'w'); 
     
    //set column headers
    $fields = array('Name', 'Mobile');
    fputcsv($f, $fields, $delimiter);
     
    //output each row of the data, format line as csv and write to file pointer
    foreach($query as $row){
        
        $lineData = array($row->name, $row->slug);
        fputcsv($f, $lineData, $delimiter);
	}
     
    //move back to beginning of file
    fseek($f, 0);
     
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
     
    //output all remaining data on a file pointer
    fpassthru($f);
 
 
*/
?>
<?php 

 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xlsx"; 

// Define column names 
$excelData[] = array('ID', 'NAME', 'SLUG',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
$query = \App\Models\ServiceCategory::get();
if(count($query)>0){ 
    foreach($query as $row){
        $status = ($row->status == 1)?'Active':'Inactive'; 
        $lineData = array($row->id, $row->name, $row->slug, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 