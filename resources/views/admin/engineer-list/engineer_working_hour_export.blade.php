
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "engineer_working_list" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('Engineer Id', 'First Name', 'Last Name', 'Email', 'Mobile', 'Working Type', 'Start Date', 'Start Time', 'End Date', 'End Time', 'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
			$engineer_working_list = \App\Models\User::where('users.user_type_id', 4)
                ->select('users.*', 'cp.working_type', 'cp.start_date', 'cp.start_time', 'cp.end_date', 'cp.end_time')
                ->leftJoin('engineer_working_hours as cp', 'cp.user_id', '=', 'users.id');
            $engineer_working_list = $engineer_working_list->latest()->get();

 // echo '<pre>';
	// print_r($engineer_working_list);
 // echo '</pre>'; 
 // exit;	
 
 // if($row->working_type=='part_time'){
	// $type = 'Part Time';
	// }else if($row->working_type=='full_time'){
		// $type = 'Full Time';
	// }
	
if(count($engineer_working_list)>0){ 
    foreach($engineer_working_list as $row){
        $type = ($row->working_type == 'part_time')?'Part Time':'Full Time'; 
        $status = ($row->status == 1)?'Active':'Inactive'; 
        
		
		
        $lineData = array($row->username, $row->first_name, $row->last_name, $row->email, $row->mobile, $type, $row->start_date, $row->start_time, $row->end_date, $row->end_time, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 