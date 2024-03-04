@extends('admin.include.master')
@section('title', 'Add New Service')
@section('content')
<style>.loading-spinner {	display: none;}.loading-spinner.active {	display: inline-block; // or whatever is appropriate to display it nicely}</style>

<div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header border-bottom pb-2">
               <div class="row align-items-center">
                  <div class="col d-flex justify-content-between">
                     <div class="breadcrumb mt-3  pb-2">
                        <a href="{{ url('admin/dashboard') }}">
                           <i class="fa fa-home" aria-hidden="true"></i>
                           Dashboard </a> / Add New Service
                     </div>
                     <div class="mt-2">
                        <a href="{{ url('admin/service') }}" class="btn btn-info float-right veiwbutton">Back</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-white shadow p-3 mb-4 rounded position-relative">
               <div class="profile-menu">
                  <ul class="nav nav-tabs nav-tabs-solid">
                     <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                        href="#indian_cuisine">Add New Service</a>
                     </li>
                  </ul>
               </div>
               <div class="tab-content profile-tab-cont mt-1">
                  <div class="tab-pane fade active show" id="indian_cuisine">
                     <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Add New Service</h6>
                     <form class="form-sample p-2" id="save-service-form" action="{{ route('admin.service.store') }}" method="post">
					  @csrf
                        <div class="row align-items-center justify-content-between">							<div class="col-md-12">
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
							</div>														<div style="display:none;" id="show-form-error" class="alert alert-danger col-md-12">								<ul>									<div class="errorMsgntainer"></div>								</ul>							</div>														<?php if(isset($_GET['already_name'])) { ?>								<div class="col-md-12">									<div class="alert alert-danger alert-dismissible fade show" role="alert">									  <strong>Name already exist please change name!</strong>									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">										<span aria-hidden="true">&times;</span>									  </button>									</div>								</div>							<?php } ?>

                            <div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Select Category</label>
								    <div class="col-sm-12">
										<select class="form-control" id="category_id" name="category_id">
											<option value="">Select Category</option>
											@foreach($service_categories as $item)
												<option value="{{ $item->id }}">{{ $item->name }}</option>
											@endforeach
										</select>

								    </div>
								</div>
                            </div>

							<div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Select Category</label>
								    <div class="col-sm-12">
										<select class="form-control" id="subcategory_id" name="subcategory_id">
											<option value="">Select Category</option>

										</select>

								    </div>
								</div>
                            </div>

							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Enter Service Name</label>
								    <div class="col-sm-12">
										<input class="form-control" name="name" placeholder="Enter Service Name">
									</div>
								</div>
                            </div>

							<div class="col-md-12">								<div class="form-group row mb-0 align-items-center">									<label class="col-sm-12  col-form-label">Enter Service Description</label>									<div class="col-sm-12">										<textarea class="form-control" id="editor" style="display: none;" name="description" placeholder="Enter Service Description"></textarea>									</div>								</div>							</div>														<div class="col-md-12">								<div class="form-group row mb-0 align-items-center">									<label class="col-sm-12  col-form-label">Enter Service Pre requisite </label>									<div class="col-sm-12">										<textarea class="form-control" id="editor2" style="display: none;"  name="service_pre_requiste" placeholder="Enter Service Pre requisite"></textarea>									</div>								</div>							</div>														<div class="col-md-12">								<div class="form-group row mb-0 align-items-center">									<label class="col-sm-12  col-form-label">Enter Service Scope of work </label>									<div class="col-sm-12">										<textarea class="form-control" id="editor3" style="display: none;"  name="service_scope_of_work" placeholder="Enter Service Scope of work"></textarea>									</div>								</div>							</div>														<div class="col-md-12">								<div class="form-group row mb-0 align-items-center">									<label class="col-sm-12  col-form-label">Enter Service Completion Criteria </label>									<div class="col-sm-12">										<textarea class="form-control" id="editor4" style="display: none;"  name="service_completion_criteria" placeholder="Enter Service Completion Criteria"></textarea>									</div>								</div>							</div>														<div class="col-md-12">								<div class="form-group row mb-0 align-items-center">									<label class="col-sm-12  col-form-label">Enter Service Inclusion </label>									<div class="col-sm-12">										<textarea class="form-control" id="editor5" style="display: none;"  name="service_inclusion" placeholder="Enter Service Inclusion"></textarea>									</div>								</div>							</div>														<div class="col-md-12">								<div class="form-group row mb-0 align-items-center">									<label class="col-sm-12  col-form-label">Enter Service Exclusion </label>									<div class="col-sm-12">										<textarea class="form-control" id="editor6" style="display: none;"  name="service_exclusion" placeholder="Enter Service Exclusion"></textarea>									</div>								</div>							</div>														<div class="col-md-12">								<div class="form-group row mb-0 align-items-center">									<label class="col-sm-12  col-form-label">Enter Service Adons </label>									<div class="col-sm-12">										<textarea class="form-control" id="editor7" style="display: none;"  name="service_adons" placeholder="Enter Service Adons"></textarea>									</div>								</div>							</div>

							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Status</label>
								    <div class="col-sm-12">
										<select class="form-control" name="status">
											 <option selected value="1">Active</option>
											 <option value="2">Inactive</option>
										  </select>
									</div>
								</div>
                            </div>

							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <div class="col-sm-12">
										<button type="submit" class="btn btn-primary btn-icon-text save_services">
											 <i class="fa fa-spinner loading-spinner" aria-hidden="true"></i> Submit
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><script src="https://code.jquery.com/jquery-3.4.1.js"></script><script type="text/javascript">    $(document).on('click', '.save_servicesss', function(e) {        e.preventDefault();        var formData = new FormData(document.getElementById("save-service-form"));        $.ajaxSetup({            headers: {                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')            }        });				$('.loading-spinner').toggleClass('active');		        $.ajax({            type: "POST",			url: "{{ route('admin.service.store') }}",			data: formData,			processData: false,			contentType: false,			dataType: "JSON",			success: function(data) {                if (data.status == true) {                    toastr.success('Added Successfully.');                    setTimeout(function() {                        window.location = "{{ url('admin/service') }}"                    }, 2000);                } else {                    toastr.error('Something went wrong.');                }				$('.loading-spinner').toggleClass('active');            },			error: function(err) {                document.getElementById('show-form-error').style = "display: block";				let error = err.responseJSON;                $.each(error.errors, function(index, value) {                    $('.errorMsgntainer').append('<span class="text-danger">' + value + '<span>' + '<br>');                });            }        });    });      </script>
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
<script>  ClassicEditor.create(document.querySelector('#editor'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });  ClassicEditor.create(document.querySelector('#editor2'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });  ClassicEditor.create(document.querySelector('#editor3'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });  ClassicEditor.create(document.querySelector('#editor4'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });  ClassicEditor.create(document.querySelector('#editor5'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });  ClassicEditor.create(document.querySelector('#editor6'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });  ClassicEditor.create(document.querySelector('#editor7'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });  ClassicEditor.create(document.querySelector('#editor8'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });		ClassicEditor.create(document.querySelector('#editor9'))    .then(editor => {      console.log(editor);    })    .catch(error => {      console.error(error);    });</script>

@endsection


