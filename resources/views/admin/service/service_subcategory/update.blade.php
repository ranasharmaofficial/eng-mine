@extends('admin.include.master')
@section('title', 'Update Service SubCategory')
@section('content')

<style>
.loading-spinner {
	display: none;
}

.loading-spinner.active {
	display: inline-block; // or whatever is appropriate to display it nicely
}
</style>

<div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header border-bottom pb-2">
               <div class="row align-items-center">
                  <div class="col d-flex justify-content-between">
                     <div class="breadcrumb mt-3  pb-2">
                        <a href="{{ url('admin/dashboard') }}">
                           <i class="fa fa-home" aria-hidden="true"></i> 
                           Dashboard
                        </a> / Service Category
                     </div>
                     <div class="mt-2">
                        <a href="{{ url('admin/service-sub-category') }}" class="btn btn-info float-right veiwbutton">Back</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-white shadow p-3 mb-4 rounded position-relative">
               <div class="profile-menu">
                  <ul class="nav nav-tabs nav-tabs-solid">
                     <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                        href="#indian_cuisine">Edit Service SubCategory</a> 
                     </li>
                  </ul>
               </div>
               <div class="tab-content profile-tab-cont mt-1">
                  <div class="tab-pane fade active show" id="indian_cuisine">
                     <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Edit Service SubCategory</h6>
                     <form id="update-subcategory-form" class="form-sample p-2" action="{{ route('admin.service_sub_category.update',$service_subcategory_details->id) }}" method="post">
						@csrf
						@method('put')
						<div class="row align-items-center justify-content-between">
						
							<div class="col-md-12">
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
							</div>
							<div style="display:none;" id="show-form-error" class="alert alert-danger col-md-12">
								<ul>
									<div class="errorMsgntainer"></div>
								</ul>
							</div>
							
                            <div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Select Category</label>
								    <div class="col-sm-12">
										<select class="form-control" name="category_id">
											<option value="">Select Category</option>
											@foreach($service_categories as $item)
												<option @if($service_subcategory_details->category_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
											@endforeach
										</select>
									  
								    </div>
								</div>
                            </div>
							
							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Enter Subcategory</label>
								    <div class="col-sm-12">
										<input class="form-control" value="{{ $service_subcategory_details->name }}" name="name" placeholder="Enter Subcategory Name">
									</div>
								</div>
                            </div>
							
							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Status</label>
								    <div class="col-sm-12">
										<select class="form-control" name="status">
											 <option @if($service_subcategory_details->status == 1) selected @endif value="1">Active</option>
											 <option @if($service_subcategory_details->status == 2) selected @endif value="2">Inactive</option>
										</select>
									</div>
								</div>
                            </div>
							
							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <div class="col-sm-12">
										<button type="button" class="btn btn-primary btn-icon-text update_subcategory">
											 <i class="fa fa-spinner loading-spinner" aria-hidden="true"></i> Update
										 </button>
									</div>
								</div>
                            </div>
						   
                            
                        </div>
						
                         
                     </form>
                  </div>
               </div>
            </div>
				@include('admin.include.topfoot')
         </div>
      </div>
	  
	   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    $(document).on('click', '.update_subcategory', function(e) {

        e.preventDefault();
        var formData = new FormData(document.getElementById("update-subcategory-form"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$('.loading-spinner').toggleClass('active');
        $.ajax({
            type: "POST",
			url: "{{ route('admin.service_sub_category.update',$service_subcategory_details->id) }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                if (data.status == true) {
                    toastr.success('Updated Successfully.');
                    setTimeout(function() {
                        window.location = "{{ url('admin/service-sub-category') }}"
                    }, 2000);
                } else {
                    toastr.error('Something went wrong.');
                }
				$('.loading-spinner').toggleClass('active');
            },
			error: function(err) {
                document.getElementById('show-form-error').style = "display: block";
				let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });
 


    

 

</script>

@endsection

@section('script')
    <script>
        tinymce.init({
            selector: 'textarea#description',
        });
    </script>
@endsection