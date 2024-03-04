
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "staff_list" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('Engineer Id', 'First Name', 'Last Name', 'Email', 'Mobile', 'Employment Sttaus',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
	$engineer_list = \App\Models\User::where('user_type_id', 5);
	$engineer_list = $engineer_list->latest()->get();

			
if(count($engineer_list)>0){ 
    foreach($engineer_list as $row){
        $status = ($row->status == 1)?'Active':'Inactive'; 
        
		if($row->employment_status==0){
			$employment_status = 'Pending';
		}else if($row->employment_status==1){
			$employment_status = 'Approved';
		}else if($row->employment_status==2){
			$employment_status = 'Rejected';
		}
		
        $lineData = array($row->username, $row->first_name, $row->last_name, $row->email, $row->mobile, $employment_status, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 