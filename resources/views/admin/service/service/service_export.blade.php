
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "master_services_" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('ID', 'Category', 'Sub Category', 'service',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
$service_master = \App\Models\Service::select('services.*', 'cp.name as categoryName','csp.name as subcategoryName')
        ->leftJoin('service_categories as cp', 'cp.id', '=', 'services.category_id')
        ->leftJoin('service_sub_categories as csp', 'csp.id', '=', 'services.subcategory_id');
        $service_master = $service_master->latest()->get();
			
if(count($service_master)>0){ 
    foreach($service_master as $row){
        $status = ($row->status == 1)?'Active':'Inactive'; 
        $lineData = array($row->id, $row->categoryName, $row->subcategoryName, $row->name, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 