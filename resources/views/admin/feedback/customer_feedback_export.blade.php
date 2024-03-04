
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "customer_feedback_list_" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('Order Id', 'First Name', 'Last Name', 'Rating', 'Feedback', 'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
			$customer_feedback_list = \App\Models\ServiceFeedback::latest()
            ->select('service_feedback.*', 'u.first_name', 'u.last_name', 'u.company_name', 'o.service_order_id')
            ->leftJoin('users as u', 'u.id', '=', 'service_feedback.user_id')
            ->leftJoin('orders as o', 'o.id', '=', 'service_feedback.order_id');
            $customer_feedback_list = $customer_feedback_list->latest()->get();

 
	
if(count($customer_feedback_list)>0){ 
    foreach($customer_feedback_list as $row){
        // $type = ($row->working_type == 'part_time')?'Part Time':'Full Time'; 
        $status = ($row->status == 1)?'Approved':'Pending'; 
        
		
		
        $lineData = array($row->service_order_id, $row->first_name, $row->last_name, $row->rating, $row->feedback, $row->created_at, $status);  
        $excelData[] = $lineData; 
    } 
} 

// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 