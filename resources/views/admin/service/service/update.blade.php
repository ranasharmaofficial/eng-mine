@extends('admin.include.master')
@section('title', 'Update Service')
@section('content')


<div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header border-bottom pb-2">
               <div class="row align-items-center">
                  <div class="col d-flex justify-content-between">
                     <div class="breadcrumb mt-3  pb-2">
                        <a href="{{ url('admin/dashboard') }}">
                           <i class="fa fa-home" aria-hidden="true"></i> 
                           Dashboard
                        </a> / Update Service
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
                        href="#indian_cuisine">Update Service</a> 
                     </li>
                  </ul>
               </div>
               <div class="tab-content profile-tab-cont mt-1">
                  <div class="tab-pane fade active show" id="indian_cuisine">
                     <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Update Service</h6>
                     <form class="form-sample p-2" action="{{ route('admin.service.update',$service_details->id) }}" method="post">
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
							<?php if(isset($_GET['update'])) { ?>
								<div class="col-md-12">
									<div class="alert alert-danger">
										Updated Successfully!
									</div>
								</div>
							<?php } ?>
								
                            <div class="col-md-6">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Select Category</label>
								    <div class="col-sm-12">
										<select class="form-control" name="category_id">
											<option value="">Select Category</option>
											@foreach($service_categories as $item)
												<option @if($service_details->category_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
											@endforeach
										</select>
									  
								    </div>
								</div>
                            </div>
							
							 @php
								$service_subcategory = \App\Models\ServiceSubcategory::get();
							 @endphp


	
							<div class="col-md-6">

								<div class="form-group row mb-0 align-items-center">

								   <label class="col-sm-12  col-form-label">Select Category</label>

								    <div class="col-sm-12">

										<select class="form-control" id="subcategory_id" name="subcategory_id">
												<option value="">Select Category</option>
												@foreach($service_subcategory as $item)
													<option @if($service_details->subcategory_id==$item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
												@endforeach
										</select>



								    </div>

								</div>

                            </div>



							<div class="col-md-12">

								<div class="form-group row mb-0 align-items-center">

								   <label class="col-sm-12  col-form-label">Enter Service Name</label>

								    <div class="col-sm-12">

										<input class="form-control" value="{{ $service_details->name }}" name="name" placeholder="Enter Service Name">

									</div>

								</div>

                            </div>



							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
									<label class="col-sm-12  col-form-label">Enter Service Description</label>
									<div class="col-sm-12">
										<textarea class="form-control" id="editor" style="display: none;" name="description" placeholder="Enter Service Description">{{ $service_details->description }}</textarea>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
									<label class="col-sm-12  col-form-label">Enter Service Pre requisite </label>
									<div class="col-sm-12">
										<textarea class="form-control" id="editor2" style="display: none;"  name="service_pre_requiste" placeholder="Enter Service Pre requisite">{{ $service_details->service_pre_requiste }}</textarea>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
									<label class="col-sm-12  col-form-label">Enter Service Scope of work </label>
									<div class="col-sm-12">
										<textarea class="form-control" id="editor3" style="display: none;"  name="service_scope_of_work" placeholder="Enter Service Scope of work">{{ $service_details->service_scope_of_work }}</textarea>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
									<label class="col-sm-12  col-form-label">Enter Service Completion Criteria </label>
									<div class="col-sm-12">
										<textarea class="form-control" id="editor4" style="display: none;"  name="service_completion_criteria" placeholder="Enter Service Completion Criteria">{{ $service_details->service_completion_criteria }}</textarea>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
									<label class="col-sm-12  col-form-label">Enter Service Inclusion </label>
									<div class="col-sm-12">
										<textarea class="form-control" id="editor5" style="display: none;"  name="service_inclusion" placeholder="Enter Service Inclusion">{{ $service_details->service_inclusion }}</textarea>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
									<label class="col-sm-12  col-form-label">Enter Service Exclusion </label>
									<div class="col-sm-12">
										<textarea class="form-control" id="editor6" style="display: none;"  name="service_exclusion" placeholder="Enter Service Exclusion">{{ $service_details->service_exclusion }}</textarea>
									</div>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group row mb-0 align-items-center">
									<label class="col-sm-12  col-form-label">Enter Service Adons </label>
									<div class="col-sm-12">
										<textarea class="form-control" id="editor7" style="display: none;"  name="service_adons" placeholder="Enter Service Adons">{{ $service_details->service_adons }}</textarea>
									</div>
								</div>
							</div>



							 
							
							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <label class="col-sm-12  col-form-label">Status</label>
								    <div class="col-sm-12">
										<select class="form-control" name="status">
											 <option @if($service_details->status == 1) selected @endif value="1">Active</option>
											 <option @if($service_details->status == 2) selected @endif value="2">Inactive</option>
										</select>
									</div>
								</div>
                            </div>
							
							<div class="col-md-4">
								<div class="form-group row mb-0 align-items-center">
								   <div class="col-sm-12">
										<button type="submit" class="btn btn-primary btn-icon-text">
											 <i class="ti-file btn-icon-prepend"></i> Update
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
	  

<script>

  ClassicEditor.create(document.querySelector('#editor'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor2'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor3'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor4'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor5'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor6'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor7'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });

  ClassicEditor.create(document.querySelector('#editor8'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });
	
	ClassicEditor.create(document.querySelector('#editor9'))

    .then(editor => {

      console.log(editor);

    })

    .catch(error => {

      console.error(error);

    });



</script>

@endsection

 
 
