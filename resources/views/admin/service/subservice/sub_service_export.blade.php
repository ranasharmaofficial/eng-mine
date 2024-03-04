
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "sub_services_" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('ID', 'service Name', 'Sub Service', 'On-Site Price', 'Off-Site Price', 'Description',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
$sub_service = \App\Models\SubService::select('sub_services.*', 'cp.name as serviceName')
        ->leftJoin('services as cp', 'cp.id', '=', 'sub_services.service_id');
        $sub_service = $sub_service->latest()->get();
			
if(count($sub_service)>0){ 
    foreach($sub_service as $row){
        $status = ($row->status == 1)?'Active':'Inactive'; 
        $lineData = array($row->id, $row->serviceName, $row->name, $row->onsite_price, $row->offsite_price, $row->description, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 