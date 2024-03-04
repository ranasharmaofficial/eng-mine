@extends('frontend.layouts.master')

@section('title') Add Booking  @endsection

@section('content')

@include('frontend.customer.partials.dash_header')



<div class="main-wrapper">



    <div class="bg-img">

        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg1">

        <img src="{{ static_asset('assets/assets_web/img/bg/work-bg-03.png')}}" alt="img" class="bgimg2">

        <img src="{{ static_asset('assets/assets_web/img/bg/feature-bg-03.png')}}" alt="img" class="bgimg3">

    </div>



    <div class="content">

            <div class="container">

                <div class="row">

                    <!-- Customer Menu -->

                    <!-- <div class="col-md-4 col-lg-3 theiaStickySidebar">

                  <?php

						   //include 'left-sidebar.php'

						?>

               </div> -->

                    <!-- /Customer Menu -->

                    <div class="col-sm-12">

                        <div class="row">

                            <section class="providers-section-two">

                                <div class="container">

                                    <div class="row">

                                        <div class="col-md-6 text-md-start aos aos-init aos-animate" data-aos="fade-up">

                                  <a href="{{ route('customer.index_booking') }}" class="btn btn-pink btn-viewall">

                                                <i class="bi bi-arrow-left-circle"></i> Back

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </section>

                            <!--tab of engineering mine section start-->

                            <!--tab of engineering mine section start-->

    <section class="offsite-support">

        <div class="container position-relative">



                <div class="col-md-12">

                    <div class="toggle-tab">

					@if(count($service_categories)>0)

                        <ul class="nav nav-tabs border-0 ms-5 justify-content-center">

                            @foreach($service_categories as $key => $item)

								<li class="nav-item tab-nav-item text-center rounded">

									<a class="nav-link text-dark @if($key+1==1) active @endif" data-bs-toggle="tab" href="#menu{{$key+1}}">{{ $item->name }}</a>

								</li>

							@endforeach

                        </ul>

					@endif



					@if(count($service_categories)>0)

                        <!-- Tab panes -->

                        <div class="tab-content field py-5">

							@foreach($service_categories as $key => $item)

								@php

									$domainList = App\Models\ServiceSubcategory::where('category_id', $item->id)->where('status', 1)->get();

								@endphp

								<div class="tab-pane container @if($key+1==1) active @endif justifly-content-round" id="menu{{$key+1}}">

									<table name="{{$key+1}}" id="myTable{{$key+1}}"

										class="input-group rounded-3 d-block w-100 border-0 fs-13 overflow-hidden">

										<tbody class="d-block w-100">

											<tr>

												<td>

													<div class="position-relative col-1ine1 align-items-center pe-0">

														<div class="d-flex justify-content-around">

															<div class="tab-domain me-2">

																<span><i class="fa fa-globe" aria-hidden="true"></i></span>

																<label>Select Domain</label>

															</div>

															<select name="subcategory_id[]" class="subcategory_choose service_subcategory form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

																id="subcategory_id" >

																<option value="" selected="">Select Domain</option>

																@foreach($domainList as $row)

																<option value="{{ $row->id }}"> {{ $row->name }} </option>

																@endforeach

															</select>

															<div class="valid-feedback">Looks good!</div>

														</div>

													</div>

												</td>

												<td>

													<div class="position-relative col-1ine1  align-items-center pe-0">

														<div class="d-flex justify-content-around">

															<div class="tab-domain me-2">

																<span><i class="fa fa-globe" aria-hidden="true"></i></span>

																<label>Sub Domain</label>

															</div>



															<select name="service_id[]" class="choose_service  form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

																id="service_id" >

																<option value="" selected="">Select Sub Domain

																</option>



															</select>



														</div>

													</div>

												</td>



												<td>

													<div class="position-relative col-1ine1 align-items-center pe-0">

														<div class="d-flex justify-content-around">

															<div class="tab-domain me-2">

																<span><i class="fa fa-globe" aria-hidden="true"></i></span>

																<label>Select Activity</label>

															</div>



															<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

																id="subservice_id" >

																<option value="" selected=""> Select Activity</option>



															</select>



														</div>

													</div>

												</td>



												<td>

													<div class="position-relative col-1ine1 align-items-center pe-0">

														<div class="d-flex justify-content-around">

															<div class="tab-domain me-2">

																<span><i class="fa fa-globe" aria-hidden="true"></i></span>

																<label>Activity Type</label>

															</div>

															<select name="activity_type[]"

																class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

																>

																<option value="" selected=""> Activity Type</option>

																<option value="on_site"> On-Site </option>

																<option value="off_site"> Off-Site </option>

															</select>



														</div>

													</div>

												</td>



												<td>

													<div class="position-relative col-1ine1 d-flex align-items-center pe-0">

														<div class="d-flex justify-content-around">

															<div class="tab-domain me-2">

																<span><i class="fa fa-globe" aria-hidden="true"></i></span>

																<label>Model</label>

															</div>

															<input type="text" name="model[]"

																class="service_model form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

																 placeholder="Model/Version ">



														</div>

													</div>

												</td>



												<td>

													<div class="position-relative col-1ine1 d-flex align-items-center pe-0">

														<div class="d-flex justify-content-around">

															<div class="tab-domain me-2">

																<span><i class="fa fa-globe" aria-hidden="true"></i></span>

																<label>Qty</label>

															</div>



															<input type="number" name="qty[]" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

																 placeholder="Qty" style="width:60px;">

															<div class="valid-feedback">Looks good!</div>

														</div>

													</div>

												</td>



												<td>

													<div class="d-flex w-160 justify-content-end">

														<button

															class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button>

														<button

															class="btn border-1 border-danger w-auto delete_button rounded-pill px-3 fs-14 bg-danger mx-1">Delete</button>

														<button

															class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button>

													</div>

												</td>

											</tr>

										</tbody>

									</table>

									<div class="position-relative justify-content-center d-flex w-50 mx-auto my-2 pt-3">

										@if(Session('LoggedCustomer') != null)

											<button class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger show-my-estimate1"

												type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">

												<i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Show My Estimate

											</button>

										@else

											<button class="btn btn-primary border-1 border-danger w-150 rounded px-3 fs-14 bg-danger show-my-estimate1"

												type="button" data-bs-toggle="modal" data-bs-target="#loginAlertModal">

												<i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Show My Estimate

											</button>

										@endif

										<button class="btn btn-primary border-1 border-success w-150 rounded px-3 fs-14 bg-success mx-2 addown"

											onclick="addRow{{$key+1}}()"><i class="fa fa-sign-in pe-2" aria-hidden="true"></i> Add

											Service

										</button>

									</div>



								</div>

							@endforeach









                       </div>



					@endif

                    </div>







                    </div>

                    <!-- \Modal Box End -->









            </div>

        </div>

    </section>



	<!-- Modal Box Start -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-xl">

                            <div class="modal-content">

                                <div class="modal-body box-type-estimate box-type-estimate4 bg-white shadow p-4 z-index-999 position-absolute top-100 w-100 rounded-3 start-0 mt-3">

                                    <button type="button" class="btn-close fs-3 bg-transparent ms-auto mt-2 mb-5 d-block text-end"

                                        data-bs-dismiss="modal" aria-label="Close"></button>

                                    <form method="post" id="save_estimate_enquiry" action="{{ route('saveQuoteEnquiry') }}" enctype="multipart/form-data" class="row g-3 needs-validation py-2">
										@csrf
										<div class="col-md-12">
												<span class="form-text text-danger" id="user_service_fields_are_required"></span>
											</div>
											<div style="display:none;" id="show-estimate-error-sss" class="alert alert-danger">
												<ul>
													<div class="errorMsgntainer"></div>
												</ul>
											</div>
										{{--<div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center  justify-content-end">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> First Name</label>
                                                </div>
                                                <input type="text" class="form-control px-0 shadow-none ps-2 ps-2 bg-white" name="first_name" placeholder="First Name" required="">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center justify-content-end">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Last Name</label>
                                                </div>
                                                <input type="text" name="last_name" class="form-control shadow-none  px-0 ps-2 ps-2 bg-white" id="validationCustom01" placeholder="Last Name" required="">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center  ">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Email Id</label>
                                                </div>
                                                <input type="email" name="email" class="form-control px-3 shadow-none  bg-white" placeholder="Email Id" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2 position-static">
                                                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Phone</label>
                                                </div>
                                                <input type="text" class="form-control shadow-none px-3 border border-muted bg-white"
                                                    name="phone" placeholder="Phone" required="">
                                            </div>
                                        </div>--}}
                                        <div class="col-md-12">
                                            <div class="mb-3 fs-13 text-start">
                                                <label for="formFile" class="px-2 text-muted">Upload Docoment <small>(File
                                                        accepted: .pdf, .doc/docx - Max file size: 150KB for demo
                                                        limit)</small></label>
                                            </div>
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2            position-static w-auto">
                                                    <span><i class="fa fa-file" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> file</label>
                                                </div>
                                                <input name="files" class="form-control shadow-none px-3 border border-muted bg-white py-2"
                                                    type="file" id="formFiles" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative d-flex align-items-center ">
                                                <div class="tab-domain me-2 position-static w-auto">
                                                    <span><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                                    <label class="w-auto fs-13"> Message</label>
                                                </div>
                                                <textarea name="message" class="form-control shadow-none fs-13 lsp-5" placeholder="Please elaborate your requirement"></textarea>

                                            </div>
                                        </div>
											<input type="hidden" name="user_service_location" id="user_service_location">
											<input type="hidden" name="user_service_date" id="user_service_date">
											<input type="hidden" name="user_service_time" id="user_service_time">
											
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger save-proper-user save_estimate_enquiry_quote" id="save_estimate_enquiry_quote" type="button">Send Message </button>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- \Modal Box End -->



					<!-- Modal Box Start -->

                    <div class="modal fade" id="loginAlertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-xl">

                            <div class="modal-content">

                                <div class="modal-body box-type-estimate box-type-estimate4 bg-white shadow p-4 z-index-999 position-absolute top-100 w-100 rounded-3 start-0 mt-3">

                                    <button type="button" class="btn-close fs-3 bg-transparent ms-auto mt-2 mb-5 d-block text-end"

                                        data-bs-dismiss="modal" aria-label="Close"></button>

                                    <div class="row g-3 needs-validation py-2">

											<div class="col-md-12">

												<h5 class="text-primary"> You are not logged in. Please Login in first.</h5>

                                            </div>

                                        </div>



                                        <div class="col-md-12 text-center">

                                            <a href="{{ url('login') }}" class="btn btn-primary border-0 w-150 float-none d-block vs-btn fs-13 lsp-5  mx-auto rounded bg-danger" type="submit">Login </a>

                                        </div>

                                   ServiceSubCategory

                                </div>

                            </div>

                        </div>

                            <!--/tab of engineering mind section end-->

                        </div>

                    </div>

                </div>



            </div>



        </div>



</div>





<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

$(".save_quote_enq").click(function(e){
			e.preventDefault();
			
			var service_location =  $('#autocomplete_ranas').val();
            var service_date = $('#service_date').val();
            var service_time = $('#service_time').val();
			var service_subcategory = $('#subcategory_id').val();
			var clk_btn = $(".save-proper-user");
			
				console.log('Location: '+service_location);
				console.log('Date: '+service_date);
				console.log('Time: '+service_time);
				
				if(service_date=='' && service_time==''){
					clk_btn.prop('disabled',true);
					document.getElementById('user_service_fields_are_required').innerHTML='Service Location, Date and Time are not selected.';
				}else{
					clk_btn.prop('disabled',false);
					document.getElementById('user_service_fields_are_required').innerHTML='';
				}
				$('#exampleModal').modal('show'); 
				$('#user_service_location').val(service_location)
				$('#user_service_time').val(service_time)
				$('#user_service_date').val(service_date)
			
			//console.log(service_subcategory);
			 
		});
		
		
		$(".save_estimate_enquiry_quote").click(function(e){
                e.preventDefault();
				
				
				var formData = new FormData(document.getElementById("save_estimate_enquiry"));
				var clk_btn = $(".save-proper-user");
                 var service_location =  $('#autocomplete_ranas').val();
				var service_date = $('#service_date').val();
				var service_time = $('#service_time').val();
				
				 
				$('#user_service_location').val(service_location)
				$('#usert_service_time').val(service_time)
				$('#user_service_date').val(service_date)
				
				 if(service_date=='' && service_time==''){
					 clk_btn.prop('disabled',true);
					document.getElementById('user_service_fields_are_required').innerHTML='Service Location, Date and Time are not selected.';
					
				}else{
					clk_btn.prop('disabled',false);
					document.getElementById('user_service_fields_are_required').innerHTML='';
				}
			
				 
				
            $.ajax({
                url: "{{ route('saveQuoteEnquiry') }}",
                 type: "POST",
                 data: formData,
					processData: false,
					contentType: false,
					dataType: "JSON",
                 success: function(data) {
					clk_btn.prop('disabled',true);
					 toastr.success('Estimation Generated Successfully.');
					 setTimeout(function(){
					 window.location = "{{ url('show-estimate/') }}"+'/'+data.temp_id },2000);

				}
				,error:function(err){
					document.getElementById('show-estimate-error-sss').style="display: block";
					// document.getElementById('go-to-login-mesaage').style="display: block";
					clk_btn.prop('disabled',false);
					let error = err.responseJSON;
					console.log(error);
					$.each(error.errors, function (index, value) {
						$('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
					});
				}
            });
				 
		});
		
		
		

var switchStatus = false;

$("#price_id").on('change', function() {

    if ($(this).is(':checked')) {

        switchStatus = $(this).is(':checked');

      // alert(switchStatus);// To verify

        //alert("on");

        $('#monthly_plan').hide();

      $('#annually_plan').show();

    }

    else {

      switchStatus = $(this).is(':checked');

      //alert(switchStatus);// To verify

      //alert("off");

      $('#monthly_plan').show();

      $('#annually_plan').hide();

    }

});



function openCity(evt, cityName) {

  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");

  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";

  }

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < tablinks.length; i++) {

    tablinks[i].className = tablinks[i].className.replace(" active", "");

  }

  document.getElementById(cityName).style.display = "block";

  evt.currentTarget.className += " active";

}









////////////////////////////////////////////////////

 function BindEvents(){

  $('#myTable2').on('click', '.delete_button2', function(e){

    $(this).closest('tr').remove()

  });

}



$('table#myTable2').on('click', '.edit_button', function(e){

   $(this).closest('tr').addClass('active');

});

function BindEvents(){

  $('#myTable3').on('click', '.delete_button3', function(e){

    $(this).closest('tr').remove()

  });

}



$('table#myTable3').on('click', '.edit_button', function(e){

   $(this).closest('tr').addClass('active');

});



function addRow2() {

    var table = document.getElementById("myTable2");

	  addClassToTr(table, "name");



      var row = table.insertRow(-1);

      var cell1 = row.insertCell(0);

      var cell2 = row.insertCell(1);

      var cell3 = row.insertCell(2);

      var cell4 = row.insertCell(3);

      var cell5 = row.insertCell(4);

      var cell6 = row.insertCell(5);

      var cell7 = row.insertCell(6);

      cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

							<div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

										<label for="">Domain</label>

								</div>

								@php

								  $secondCategory = \App\Models\serviceSubcategory::where('category_id', 2)->where('status', 1)->get();

								@endphp

								<select name="subcategory_id[]" class="form-control service_subcategory subcategory_choose ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">

									<option value="" selected="">Select Domain</option>

									@foreach($secondCategory as $item)

										<option value="{{ $item->id }}"> {{ $item->name }} </option>

									@endforeach

								</select>

								<div class="valid-feedback">Looks good!</div>

							</div>

						</div>`;

      cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">

							<div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label for="">Domain</label>

								</div>

								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">

									<option value="" selected="">Select Sub Domain</option>

								</select>

								<div class="valid-feedback">Looks good!</div>

							</div>

						</div>`;

      cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

                             <div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label>Select Activity</label>

								</div>



								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

									id="subservice_id" >

									<option value="" selected=""> Select Activity</option>



								</select>



							</div>

                          </div>`;

      cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

                              <div class="d-flex justify-content-around">

                                  <div class="tab-domain me-2">

                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>

                                      <label for="">Activity Type</label>

                                  </div>

                                  <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">

									<option value="" selected=""> Activity Type</option>

									<option value="on_site"> On-Site </option>

									<option value="off_site"> Off-Site </option>

								</select>

                                  <div class="valid-feedback">Looks good!</div>

                              </div>

                          </div>`;

      cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';

      cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">

                              <div class="d-flex justify-content-around">

                                  <div class="tab-domain me-2">

                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>

                                      <label for="">Qty</label>

                                  </div>

                                  <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="qty" placeholder="Qty" required="" style="width:60px;">

                                  <div class="valid-feedback">Looks good!</div>

                              </div>

                         </div>`;

      cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';

};



function addRow3() {

    var table = document.getElementById("myTable3");

	  addClassToTr(table, "name");



      var row = table.insertRow(-1);

      var cell1 = row.insertCell(0);

      var cell2 = row.insertCell(1);

      var cell3 = row.insertCell(2);

      var cell4 = row.insertCell(3);

      var cell5 = row.insertCell(4);

      var cell6 = row.insertCell(5);

      var cell7 = row.insertCell(6);

      cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

							<div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label for="">Domain</label>

								</div>

								@php

								  $thirdCategory = \App\Models\serviceSubcategory::where('category_id', 2)->where('status', 1)->get();

								@endphp

								<select name="subcategory_id[]" class="form-control service_subcategory subcategory_choose ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">

									<option value="" selected="">Select Domain</option>

									@foreach($thirdCategory as $item)

										<option value="{{ $item->id }}"> {{ $item->name }} </option>

									@endforeach

								</select>

								<div class="valid-feedback">Looks good!</div>

							</div>

						</div>`;

      cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">

							<div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label for="">Domain</label>

								</div>

								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">

									<option value="" selected="">Select Sub Domain</option>

								</select>

								<div class="valid-feedback">Looks good!</div>

							</div>

						</div>`;

      cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

                              <div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label>Select Activity</label>

								</div>



								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

									id="subservice_id" >

									<option value="" selected=""> Select Activity</option>



								</select>



							</div>

                          </div>`;

      cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

                              <div class="d-flex justify-content-around">

                                  <div class="tab-domain me-2">

                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>

                                      <label for="">Activity Type</label>

                                  </div>

                                  <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">

									<option value="" selected=""> Activity Type</option>

									<option value="on_site"> On-Site </option>

									<option value="off_site"> Off-Site </option>

								</select>

                                  <div class="valid-feedback">Looks good!</div>

                              </div>

                          </div>`;

      cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';

      cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">

                              <div class="d-flex justify-content-around">

                                  <div class="tab-domain me-2">

                                      <span><i class="fa fa-globe" aria-hidden="true"></i></span>

                                      <label for="">Qty</label>

                                  </div>

                                  <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="qty" placeholder="Qty" required="" style="width:60px;">

                                  <div class="valid-feedback">Looks good!</div>

                              </div>

                         </div>`;

      cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';

};



// Get all the "Delete" buttons

const deleteButtons = document.querySelectorAll('.btn-delete');



// Add event listener to each button

function BindEvents(){

  $('#myTable2').on('click', '.delete_button', function(e){

    $(this).closest('tr').remove()

  });

}



$('table#myTable2').on('click', '.edit_button', function(e){

   $(this).closest('tr').addClass('active');

});



$('table#myTable2').on('click', '.update_button', function(e){

   $(this).closest('tr').removeClass('active');

});

//////

function BindEvents(){

  $('#myTable3').on('click', '.delete_button', function(e){

    $(this).closest('tr').remove()

  });

}



$('table#myTable3').on('click', '.edit_button', function(e){

   $(this).closest('tr').addClass('active');

});



$('table#myTable3').on('click', '.update_button', function(e){

   $(this).closest('tr').removeClass('active');

});

//////

$('table').on('click', 'input[type="button"]', function(e){

   $(this).closest('tr').remove()

});

$('table').on('click', '.removes-row', function(e){

   $(this).closest('tr').remove()

});



$(".cast_est_btn").on("click", function(){

  $(this).addClass('active');

  RefreshTable();

});

function RefreshTable() {

  $( "#load_tables" ).load( "index.php #table_content" );

}



function BindEvents(){

  $('#myTable').on('click', '.delete_button', function(e){

    $(this).closest('tr').remove()

  });

}



$('table#myTable').on('click', '.edit_button', function(e){

   $(this).closest('tr').addClass('active');

});



$('table#myTable').on('click', '.update_button', function(e){

   $(this).closest('tr').removeClass('active');

});

//

const addClassToTr = (table, className="added")=>{

	const trs = table.querySelectorAll("tr");

	trs.forEach(tr=>{

		tr.classList.add(className);

	})

}

//









function addRow1() {

    var table = document.getElementById("myTable1");

	  addClassToTr(table, "name");

    @php

      $firstCategory = \App\Models\serviceSubcategory::where('category_id', 1)->where('status', 1)->get();

    @endphp

    var row = table.insertRow(-1);

    var cell1 = row.insertCell(0);

    var cell2 = row.insertCell(1);

    var cell3 = row.insertCell(2);

    var cell4 = row.insertCell(3);

    var cell5 = row.insertCell(4);

    var cell6 = row.insertCell(5);

    var cell7 = row.insertCell(6);



    cell1.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

							<div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label for="">Domain</label>

								</div>

								<select name="subcategory_id[]" class="form-control subcategory_choose service_subcategory ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04">

									<option value="" selected="">Select Domain</option>

									@foreach($firstCategory as $item)

										<option value="{{ $item->id }}"> {{ $item->name }} </option>

									@endforeach

								</select>

							</div>

						</div>`;

    cell2.innerHTML = `<div class="position-relative col-1ine1  align-items-center pe-0">

							<div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label for="">Domain</label>

								</div>

								<select id="service_id" name="service_id[]" class="form-control choose_service ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" id="validationCustom04" required="">

									<option value="" selected="">Select Sub Domain</option>

								</select>

							</div>

						</div>`;

    cell3.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

							<div class="d-flex justify-content-around">

								<div class="tab-domain me-2">

									<span><i class="fa fa-globe" aria-hidden="true"></i></span>

									<label>Select Activity</label>

								</div>



								<select name="subservice_id[]" class="service_subservice_id form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"

									id="subservice_id" >

									<option value="" selected=""> Select Activity</option>



								</select>



							</div>

						</div>`;

    cell4.innerHTML = `<div class="position-relative col-1ine1 align-items-center pe-0">

                            <div class="d-flex justify-content-around">

                                <div class="tab-domain me-2">

                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>

                                    <label for="">Activity Type</label>

                                </div>

                                <select name="activity_type[]" class="activity_type form-control ms-1 me-2 w-90 outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5">

									<option value="" selected=""> Activity Type</option>

									<option value="on_site"> On-Site </option>

									<option value="off_site"> Off-Site </option>

								</select>

                                <div class="valid-feedback">Looks good!</div>

                            </div>

                        </div>`;

    cell5.innerHTML = '<div class="abc position-relative col-1ine1 d-flex align-items-center pe-0"> <div class="d-flex justify-content-around"> <div class="tab-domain me-2"> <span><i class="fa fa-globe" aria-hidden="true"></i></span> <label for="">Domain</label> </div> <input type="text" class="form-control ms-1 me-2 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5" value="" placeholder="Model/Version" required=""> <div class="valid-feedback">Looks good!</div> </div> </div>';

    cell6.innerHTML = `<div class="position-relative col-1ine1 d-flex align-items-center pe-0">

                            <div class="d-flex justify-content-around">

                                <div class="tab-domain me-2">

                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>

                                    <label for="">Qty</label>

                                </div>

                                <input type="number" class="service_quantity form-control ms-1 me-1 w-100px outline-0 h-40px border shadow-none fs-13 rounded-pill px-2 fs-13 lsp-5"  placeholder="Qty" required="" style="width:60px;">

                                <div class="valid-feedback">Looks good!</div>

                            </div>

                       </div>`;

    cell7.innerHTML = '<div class="d-flex w-160 justify-content-end"><button class="btn btn-primary border-1 border-danger edit_button w-auto rounded-pill px-3 fs-14 bg-danger mx-1">Edit</button><input type="button" class="delete_button btn btn-primary border-1 border-danger w-auto rounded-pill px-3 fs-14 bg-danger mx-1" value="Delete"><button class="btn btn-primary border-1 border-danger update_button d-none w-auto rounded-pill px-2 fs-14 bg-danger mx-1">Update</button> </div>';



};



$(".show-my-estimate1").click(function(){

  $(".box-type-estimate4").toggle();

});













		/** get service list from here */

        $(document).on('change', '.subcategory_choose', function() {

			let subcategory_id = $(this).val();

            let row = $(this).closest('tr');

            row.find('.choose_service').empty();

            row.find('.choose_service').append('<option value="" selected disabled>Select Service</option>');

			// console.log(subcategory_id);

			// console.log('subcategory onchange');

			$.ajax({

                url: "{{ url('get-service-list') }}",

                 type: "POST",

                 data: {

                     subcategory_id: subcategory_id,

                     _token: '{{ csrf_token() }}'

                 },

                 dataType: 'json',

                 success: function(result) {

					// console.log(result);

				    $.each(result.subcategories, function(key, value) {

                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');

                        row.find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');

                    });

               },

               error: function(jqXHR, textStatus, errorThrown) {

                    console.log('AJAX Error:', textStatus, errorThrown);

                }

             });

        });



		/** get sub service list from here */



        $(document).on('change', '.choose_service', function() {

			let service_id = $(this).val();

            let row = $(this).closest('tr');

            row.find('.service_subservice_id ').empty();

            row.find('.service_subservice_id ').append('<option value="" selected disabled>Select Sub Service</option>');

			// console.log(subcategory_id);

			// console.log('subcategory onchange');

			$.ajax({

                url: "{{ url('get-subservice-list') }}",

                 type: "POST",

                 data: {

                    service_id: service_id,

                     _token: '{{ csrf_token() }}'

                 },

                 dataType: 'json',

                 success: function(result) {

					// console.log(result);

				    $.each(result.subcategories, function(key, value) {

                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');

                        row.find('.service_subservice_id ').append('<option value="' + value.id + '">' + value.name + '</option>');

                    });

               },

               error: function(jqXHR, textStatus, errorThrown) {

                    console.log('AJAX Error:', textStatus, errorThrown);

                }

             });

        });





        /*$('#service_id').on('change', function() {

            var service_id = this.value;

            $.ajax({

                url: "{{ url('get-subservice-list') }}",

                type: "POST",

                data: {

                    service_id: service_id,

                    _token: '{{ csrf_token() }}'

                },

                dataType: 'json',

                success: function(result) {

                    $('#subservice_id').html('<option value="">Select Service</option>');

                    $.each(result.subcategories, function(key, value) {

                        $("#subservice_id").append('<option value="' + value.id +

                            '">' + value.name + '</option>');

                    });

                }

            });

        });

        */



        /* Store service data in session */



        $(document).on('change', '.service_quantity', function() {



            let row = $(this).closest('tr');



            let service_subcategory = row.find('.service_subcategory').val();

            let choose_service = row.find('.choose_service').val();

            let service_subservice_id = row.find('.service_subservice_id').val();

            // let 'subcategory : '+activity_type = row.find('.activity_type').val();

            let service_model = row.find('.service_model').val();

            let service_quantity = row.find('.service_quantity').val();

            let activity_type = row.find('.activity_type').val();



            // console.log(service_subcategory);



            console.log('subcategory : '+service_subcategory);

            console.log('service : '+choose_service);

            console.log('sub service : '+service_subservice_id);

            console.log('activity type : '+activity_type);

            console.log('model : '+service_model);

            console.log('quantity : '+service_quantity);





			$.ajax({

                url: "{{ url('store-service-categories') }}",

                 type: "POST",

                 data: {

                    subcategory_id: service_subcategory,

                    service_id: choose_service,

                    subservice_id: service_subservice_id,

                    activity_type: activity_type,

                    model: service_model,

                    qty: service_quantity,

                     _token: '{{ csrf_token() }}'

                 },

                 dataType: 'json',

                 success: function(result) {

					// console.log(result);

				    $.each(result.subcategories, function(key, value) {

                        // $(this).closest('tr').find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');

                        row.find('.choose_service').append('<option value="' + value.id + '">' + value.name + '</option>');

                    });

               },

               error: function(jqXHR, textStatus, errorThrown) {

                    console.log('AJAX Error:', textStatus, errorThrown);

                }

             });



        });







    </script>



@endsection

