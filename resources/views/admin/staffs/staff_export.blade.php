
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "staff_list_" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('Id', 'First Name', 'Last Name', 'Email', 'Phone', 'Role',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
	$staffs_list = \App\Models\User::where('user_type_id',5)->select(['users.*','master_designations.name as roleName'])->latest()
			->leftjoin('master_designations', 'master_designations.id', '=', 'users.user_designation_id')->get();

			
if(count($staffs_list)>0){ 
    foreach($staffs_list as $row){
		$status = ($row->status == 1)?'Active':'Inactive'; 
		$lineData = array($row->id, $row->first_name, $row->last_name, $row->email, $row->mobile, $row->roleName, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
exit; 
 
?>

 