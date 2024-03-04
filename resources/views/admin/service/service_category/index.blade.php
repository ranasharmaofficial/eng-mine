@extends('admin.include.master')
@section('title', 'Service Category List')
@section('content')


<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header mb-0 mt-3">
                  <div class="row align-items-center justify-conent-between">
                     <div class="col">
                        <div class="breadcrumb  "><a href="index.php">
                           <i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> / Service List
                        </div>
						</div>
                        <div class=" col">
							<a href="{{ url('admin/service_category/create') }}" class="btn btn-info float-right veiwbutton"><i class="fa fa-plus" aria-hidden="true"></i> Add Service Category</a>
                        </div>

                  </div>
               </div>
			   <hr>
               <div class="main-panel card-header ">
                  <form method="get" class="row gutters-5 align-items-center">
                     <div class="col">
                        <h5 class="mb-md-0 h6">Services List</h5>
                     </div>
                     <div class="col text-right">
                       <a href="{{ url('admin/service_category_export') }}" class="btn btn-circle btn-info h-35" download >
                        <span>Export in Excel</span>
                        </a>
                     </div>

						 <div class="col-md-3">
							<div class="form-group mb-0">
							   <input type="text" class="form-control form-control-sm h-35" id="search" name="search" placeholder="Search...">
							</div>
						 </div>
						 <div class="col-md-1 text-right">
							<button type="submit" class="btn btn-primary btn-icon-text h-35">
							<i class="ti-file btn-icon-prepend"></i>
							Submit
							</button>
						 </div>
						 <div class="col-md-1 text-right">
							<a href="{{ url('admin/service_category') }}" class="btn btn-warning btn-icon-text h-35">
							 Refresh
							</a>
						 </div>

                  </form>
                  <hr>
                  <div class="card shadow-0">
                     <div class="card-body p-0">
                        <div class="table-responsive">
                           <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Sl. No.
                                                </th>
												<th>
                                                    Service Category
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Created Date
                                                </th>
                                                <th>
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pages as $key => $value)
												<tr>
													<td>{{ $key + 1 }}</td>
													<td>{{ $value->name }}</td>
													<td>
														<div class="actions"> @if($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
													</td>
													<td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
													<td class="text-right">
													<a class="btn btn-primary" href="{{ route('admin.service_category.edit',$value->id) }}">Edit</a>
													 {{-- <a onclick="return confirm('Are you sure, you want to delete this?')" href="{{route('admin.service_category.delete',$value->id)}}" class="btn btn-danger">Delete</a> --}}

													</td>
												</tr>
											@endforeach

                                        </tbody>
                                    </table>
                        </div>

						<div class="aiz-pagination mt-3 w-100">
							<div class="pagination">
									{{ $pages->appends(request()->input())->links() }}
							</div>
						</div>

						<!-- <div class="aiz-pagination mt-3 w-100">
							<div class="row justify-content-between">
								<div class="col-sm-12 col-md-5">
									<div class="dataTables_info fs-13 fw-bold" id="geniustable_info" role="status" aria-live="polite">Showing 1 to 7 of 7 entries</div>
								</div>
								<div class="col-sm-12 col-md-7">
									<div class="dataTables_paginate paging_simple_numbers" id="geniustable_paginate">
										<ul class="pagination justify-content-end">
											<li class="paginate_button page-item previous disabled" id="geniustable_previous">
											<a href="#" aria-controls="geniustable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
											<li class="paginate_button page-item active"><a href="#" aria-controls="geniustable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
											<li class="paginate_button page-item "><a href="#" aria-controls="geniustable" data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
											<li class="paginate_button page-item "><a href="#" aria-controls="geniustable" data-dt-idx="1" tabindex="0" class="page-link">3</a></li>
											<li class="paginate_button page-item next disabled" id="geniustable_next"><a href="#" aria-controls="geniustable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
										</ul>
									</div>
								</div>
							</div>
                        </div>-->
                     </div>


                  </div>
                  <div>
                  </div>
               </div>
               @include('admin.include.topfoot')
            </div>
         </div>


@endsection

