@extends('admin.include.master')
@section('title', 'Update Sub Service')
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
                        </a> / Update Sub Service
                     </div>
                     <div class="mt-2">
                        <a href="{{ url('admin/sub-service') }}" class="btn btn-info float-right veiwbutton">Back</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-white shadow p-3 mb-4 rounded position-relative">
               <div class="profile-menu">
                  <ul class="nav nav-tabs nav-tabs-solid">
                     <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                        href="#indian_cuisine">Update Sub Service</a> 
                     </li>
                  </ul>
               </div>
               <div class="tab-content profile-tab-cont mt-1">
                  <div class="tab-pane fade active show" id="indian_cuisine">
                     <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Update Sub Service</h6>
                     <form class="form-sample p-2" id="update-subservice-form"  action="{{ route('admin.subservice.update',$subservice_details->id) }}" method="post">
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
							
							<div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">

								   <label class="col-sm-12  col-form-label">Select Category</label>

								    <div class="col-sm-12">

										<select class="form-control" id="category_id" name="category_id">

											<option value="">Select Category</option>
										@php
											$service_details = \App\Models\Service::where('id', $subservice_details->service_id)->first();
										@endphp
											@foreach($service_categories as $item)

												<option @if($service_details->category_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>

											@endforeach

										</select>



								    </div>

								</div>

                            </div>



							<div class="col-md-6">

								<div class="form-group row mb-0 align-items-center">

								   <label class="col-sm-12  col-form-label">Select Subcategory</label>

								    <div class="col-sm-12">

										<select class="form-control" id="subcategory_id" name="subcategory_id">

											<option value="">Select Subcategory</option>
											@foreach($service_sub_categories as $item)
												<option @if($service_details->subcategory_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
											@endforeach


										</select>



								    </div>

								</div>

                            </div>
								
							<div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Select Service</label>
								    <div class="col-sm-12">
										<select class="form-control" id="service_id" name="service_id">
											<option value="">Select Service</option>
											@foreach($service_list as $item)
												<option @if($subservice_details->service_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
                            </div>
							
							<div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Enter Sub Service Name</label>
								    <div class="col-sm-12">
										<input class="form-control" value="{{ $subservice_details->name }}" name="name" placeholder="Enter Service Name">
									</div>
								</div>
                            </div>
							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Enter Description</label>
								    <div class="col-sm-12">
										<textarea class="form-control" name="description" placeholder="Enter Service Description">{{ $subservice_details->description }}</textarea>
									</div>
								</div>
                            </div>
							
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-12  col-form-label">Onsite Price</label>

									<div class="col-sm-12">
										<input type="text" placeholder="Onsite Price" class="form-control" name="onsite_price" value="{{ $subservice_details->onsite_price }}">
										<div class="error-msg" role="alert"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-12  col-form-label">Offsite Price</label>

									<div class="col-sm-12">
										<input type="text" placeholder="Offsite Price" class="form-control" name="offsite_price" value="{{ $subservice_details->offsite_price }}">
										<div class="error-msg" role="alert"></div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Status</label>
								    <div class="col-sm-12">
										<select class="form-control" name="status">
											 <option @if($subservice_details->status == 1) selected @endif value="1">Active</option>
											 <option @if($subservice_details->status == 2) selected @endif value="2">Inactive</option>
										</select>
									</div>
								</div>
                            </div>
							
							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <div class="col-sm-12">
										<button type="button" class="btn btn-primary btn-icon-text save_subservice">
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
    $(document).on('click', '.save_subservice', function(e) {

        e.preventDefault();
        var formData = new FormData(document.getElementById("update-subservice-form"));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		
		$('.loading-spinner').toggleClass('active');
		
        $.ajax({
            type: "POST",
			url: "{{ route('admin.subservice.update',$subservice_details->id) }}",
			data: formData,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data) {
                if (data.status == true) {
                    toastr.success('Updated Successfully.');
                    // setTimeout(function() {
                        // window.location = "{{ url('admin/subservice') }}"
                    // }, 2000);
					window.location = "{{ url('admin/sub-service') }}"
                } else {
                    toastr.error('Something went wrong.');
                }
				$('.loading-spinner').toggleClass('active');
            },
			error: function(err) {
				$('.loading-spinner').removeClass('active');
                document.getElementById('show-form-error').style = "display: block";
				let error = err.responseJSON;
                $.each(error.errors, function(index, value) {
                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');

                });

            }



        });

    });
 


    

 

</script>

<script>

    $(document).ready(function() {



        $('#category_id').on('change', function() {
			var category_id = this.value;
			// $("#block_id").html('');
			$.ajax({
				url: "{{ url('admin/get-subcategory-list') }}",
				type: "POST",
				data: {
					category_id: category_id,
					_token: '{{ csrf_token() }}'

                },
				dataType: 'json',
				success: function(result) {
					$('#subcategory_id').html('<option value="">Select Subcategory</option>');
					$.each(result.subcategories, function(key, value) {
						$("#subcategory_id").append('<option value="' + value.id +'">' + value.name + '</option>');
					});
				}
			});
		});
		
		$('#subcategory_id').on('change', function() {
			var subcategory_id = this.value;
			$.ajax({
				url: "{{ url('admin/get-service-list-ad') }}",
				type: "POST",
				data: {
					subcategory_id: subcategory_id,
					_token: '{{ csrf_token() }}'

                },
				dataType: 'json',
				success: function(result) {
					$('#service_id').html('<option value="">Select Service</option>');
					$.each(result.servicesss, function(key, value) {
						$("#service_id").append('<option value="' + value.id +'">' + value.name + '</option>');
					});
				}
			});
		});



	});







    </script>
<script>
    $(document).ready(function() {

        $('#category_id').on('change', function() {
            var category_id = this.value;
            // $("#block_id").html('');
            $.ajax({
                url: "{{ url('admin/get-subcategory-list') }}",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#subcategory_id').html('<option value="">Select Subcategory</option>');
                    $.each(result.subcategories, function(key, value) {
                        $("#subcategory_id").append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                }
            });
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
