
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "customer_list" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('Customer Id', 'First Name', 'Last Name', 'Email', 'Mobile', 'Address',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
	$customer_list = \App\Models\User::where('users.user_type_id', 3)->where('users.is_verified', 1)
                ->select('users.*', 'co.name as countryName', 's.name as stateName', 'c.name as cityName',)
                ->leftJoin('countries as co', 'co.id', '=', 'users.country')
                ->leftJoin('states as s', 's.id', '=', 'users.state')
                ->leftJoin('cities as c', 'c.id', '=', 'users.city');
                $customer_list = $customer_list->latest()->get();

			
if(count($customer_list)>0){ 
    foreach($customer_list as $row){
        
		$status = ($row->status == 1)?'Active':'Inactive'; 
        
		$lineData = array($row->username, $row->first_name, $row->last_name, $row->email, $row->mobile, $row->address, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 