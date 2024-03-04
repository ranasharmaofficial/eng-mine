
<?php 
// Include XLSX generator library 
require_once 'PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "ongoing_order_list" . date('d-M-Y') . ".xlsx"; 

// Define column names 
$excelData[] = array('Order Id', 'First Name', 'Last Name', 'Mobile', 'Payment Staus',  'CREATED AT', 'STATUS'); 
 
// Fetch records from database and store in an array 
	$service_all_orders = \App\Models\Order::where('orders.status', 2)
            ->select('orders.*', 'u.first_name', 'u.last_name', 'u.mobile')
            ->leftJoin('users as u', 'u.id', '=', 'orders.user_id')
            ->leftJoin('users as e', 'e.id', '=', 'orders.engineer_id');
            $service_all_orders = $service_all_orders->latest()->get();

			
if(count($service_all_orders)>0){ 
    foreach($service_all_orders as $row){
        $status = ($row->status == 1)?'Active':'Inactive'; 
        
		if($row->payment_status=='cancelled'){
			$payment_status = 'Cancelled';
		}else if($row->payment_status=='paid'){
			$payment_status = 'Paid';
		}else if($row->payment_status=='unpaid'){
			$payment_status = 'Un Paid';
		}
		
		if($row->status=='0'){
			$order_status = 'Pending';
		}elseif($row->status=='1'){
			$order_status = 'Assign to Engineer';
		}elseif($row->status=='2'){
			$order_status = 'Ongoing';
		}elseif($row->status=='3'){
			$order_status = 'Completed';
		}elseif($row->status=='4'){
			$order_status = 'Declined';
		}elseif($row->status=='5'){
			$order_status = 'Cancelled';
		}elseif($row->status=='6'){
			$order_status = 'Upcoming';
		}
		
        $lineData = array($row->service_order_id, $row->first_name, $row->last_name, $row->mobile, $payment_status, $row->created_at, $order_status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>

 