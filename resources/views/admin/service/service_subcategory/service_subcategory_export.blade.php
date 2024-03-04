
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "service_sub_category_" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('ID', 'Service Category', 'Sub Category',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
$service_subcategories = \App\Models\ServiceSubCategory::select('service_sub_categories.*', 'cp.name as categoryName')
            ->leftJoin('service_categories as cp', 'cp.id', '=', 'service_sub_categories.category_id');
            $service_subcategories = $service_subcategories->latest()->get();
			
if(count($service_subcategories)>0){ 
    foreach($service_subcategories as $row){
        $status = ($row->status == 1)?'Active':'Inactive'; 
        $lineData = array($row->id, $row->categoryName, $row->name, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 