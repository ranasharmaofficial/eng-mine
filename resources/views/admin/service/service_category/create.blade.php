@extends('admin.include.master')
@section('title', 'Add New Service')
@section('content')


<div class="page-wrapper">
         <div class="content container-fluid">
            <div class="page-header border-bottom pb-2">
               <div class="row align-items-center">
                  <div class="col d-flex justify-content-between">
                     <div class="breadcrumb mt-3  pb-2">
                        <a href="dashboard.php">
                           <i class="fa fa-home" aria-hidden="true"></i> 
                           Dashboard
                        </a> / Service Category
                     </div>
                     <div class="mt-2">
                        <a href="{{ url('admin/service_category') }}" class="btn btn-info float-right veiwbutton">Back</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-white shadow p-3 mb-4 rounded position-relative">
               <div class="profile-menu">
                  <ul class="nav nav-tabs nav-tabs-solid">
                     <li class="nav-item"> <a class="nav-link active border rounded-top" data-toggle="tab"
                        href="#indian_cuisine">Add Service Category</a> 
                     </li>
                  </ul>
               </div>
               <div class="tab-content profile-tab-cont mt-1">
                  <div class="tab-pane fade active show" id="indian_cuisine">
                     <h6
                        class="card-title text-uppercase lsp-5 fw-700 fw-bold fs-4 mt-2 position-absolute top-0 right-0 pt-3 pr-3">
                        Add New Service Category</h6>
                     <form class="form-sample p-2" action="{{ route('admin.service_category.store') }}" method="post">
					 
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

                              <div class="row">
                                 @csrf
								
                                 <div class="col-md-12">
                                    <div class="form-group row mb-0 align-items-center">
                                       <label class="col-sm-12  col-form-label">Category</label>
                                       <div class="col-sm-12">
                                          <input type="text" class="form-control" name="name" id="description"
                                             value="">
                                          <div class="error-msg" role="alert"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group row mb-0">
                                       <label class="col-sm-12 col-form-label">Status</label>
                                       <div class="col-sm-12">
										  <select class="form-control" name="status">
											 <option selected value="1">Active</option>
											 <option value="2">Inactive</option>
										  </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-1 ps-0 pl-0 text-right">
                              <label class="col-sm-12 col-form-label">&nbsp;</label>
                              <button type="submit" class="btn btn-primary btn-icon-text">
                                 <i class="ti-file btn-icon-prepend"></i> Submit
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
				@include('admin.include.topfoot')
         </div>
      </div>


 

@section('script')
    <script>
        tinymce.init({
            selector: 'textarea#description',
        });

    </script>
@endsection

@endsection


