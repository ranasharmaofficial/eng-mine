
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "client_export_list_" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('ID', 'CLIENT NAME', 'COMPANY NAME',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
	$client_list = \App\Models\Client::get();

	
		
if(count($client_list)>0){ 
    foreach($client_list as $row){
        $status = ($row->status == 1)?'Active':'Inactive'; 
        $lineData = array($row->id, $row->client_name, $row->description, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 