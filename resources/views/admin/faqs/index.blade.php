@extends('admin.include.master')
@section('title', 'FAQ List')
@section('content')


<div class="page-wrapper">
            <div class="content container-fluid">
				<div class="page-header mb-0 pt-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="breadcrumb "><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a> / FAQs</div>
                        </div>
                            <div class="col">
							   <a href="{{ url('admin/faqs/create') }}" class="btn btn-info float-right veiwbutton "><i class="fa fa-plus" aria-hidden="true"></i> Add New FAQs</a>
							</div>
                    </div>
                </div>
                <hr>
                <div class="card">
                   <div class="main-panel card-header ">
                     <div class="row gutters-5 align-items-center">
                  <div class="col pr-0">
                     <h5 class="mb-md-0 h6">FAQs</h5>
                  </div>
                  <div class="col text-right">
                    <a href="image/incomplete_orders.xlsx" class="btn btn-circle btn-info h-35" download >
                     <span>Export in Excel</span>
                     </a>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group mb-0">
                        <input type="text" class="form-control form-control-sm h-35" id="search" name="search" placeholder="Search...">
                     </div>
                  </div>
                  <div class="col-md-1 pl-0 text-right">
                     <button type="submit" class="btn btn-danger btn-icon-text h-35">
                     <i class="ti-file btn-icon-prepend"></i>
                     Submit
                     </button>
                  </div>
               </div>
               <hr>
                    <div class="card-body px-0">
						<div class="table-responsive">
							<table id="hotel_table" class="table aiz-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $key => $value)
									@php
										$cat_name = \App\Models\FaqCategory::where('id', $value->faq_category)->first();
									@endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->question }}</td>
                                        <td>{!! $value->answer !!}</td>
                                        <td>
                                            <div class="actions"> @if($value->status == 1) <a href="#" class="btn btn-sm bg-success-light mr-2">Active</a> @else <a href="#" class="btn btn-sm bg-danger-light mr-2">Inactive</a> @endif </div>
                                        </td>
                                        <td>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> 
                                                <a class="text-primary" href="{{ route('admin.faqs.edit',$value->id) }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                <a class="text-danger" onclick="return confirm('Are you sure, you want to delete this?')" href="{{route('admin.faqs.delete',$value->id)}}"><i class="fas fa-trash-alt m-r-5"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
						</div>
                            <div class="pagination">
                                {{ $faqs->appends(request()->input())->links() }}
                            </div>
							
                         
                    </div>
                </div>
            </div>
            @include('admin.include.topfoot')
        </div>
    </div>
	

     
	 
 
@endsection

 

