@extends('frontend.layouts.master')
@section('title') Profile  @endsection
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
                <div class="col-md-4 col-lg-3 theiaStickySidebar">
                    @include('frontend.customer.partials.left-sidebar')
                </div>
                <!-- /Customer Menu -->
                <div class="col-md-8 col-lg-9">
                    <div class="widget-title d-flex align-items-center justify-content-between">
                        <h4 class="fw-bold">User Profile</h4>
                        <a href="{{ route('customer.edit-profile') }}"
                            class="fs-14 py-1 bg-primary2 rounded-pill px-4 text-white bt-hover">Edit</a>
                    </div>
                    <hr>
                    <div class="fomr-news">
                        <h6 class="user-title">Profile Picture</h6>
                        <div class="pro-picture">
                            <div class="pro-img">
                                <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="user">
                            </div>
                            <div class="pro-info">
                                <div class="d-flex align-items-center justify-content-start">
                                    <h6 class="mb-0">{{ $profile_details->first_name }}</h6>
                                </div>
                                <p class="mt-0"> Member Since Sep 2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="white_block mt-3">
                        <table class="table mb-0 border mb-3 custom-table rounded">
                            <thead class="thead-light ">
                                <tr>
                                    <th class="w-50 ps-3 text-primary">General Information</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
							
								@if($profile_details->username!=null)
									<tr>
										<td class="fw-bold ps-3">Customer Id </td>
										<td>{{ $profile_details->username }}</td>
									</tr>
								@endif
								
                                <tr>
                                    <td class="fw-bold ps-3">Company Name </td>
                                    <td>{{ $profile_details->company_name }} </td>
                                </tr>
                                 
                                <tr>
                                    <td class="fw-bold ps-3">GST Number</td>
                                    <td>{{ $profile_details->gst_number }} </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold ps-3">Email</td>
                                    <td> {{ $profile_details->email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold ps-3">Address</td>
                                    <td>{{ $profile_details->address }} </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold ps-3">Phone Number</td>
                                    <td>{{ $profile_details->mobile }} </td>
                                </tr>
                                {{--
									<tr>
										<td class="fw-bold ps-3">Alternate Phone Number</td>
										<td>{{ $profile_details->mobile }} </td>
									</tr>
								--}}
                                <tr>
                                    <td class="fw-bold ps-3">Country</td>
                                    <td> {{ $profile_details->countryName }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold ps-3">State</td>
                                    <td> {{ $profile_details->stateName }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold ps-3">City</td>
                                    <td>{{ $profile_details->cityName }} </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold ps-3">Pin code</td>
                                    <td>{{ $profile_details->pincode }} </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
     @if(Session::has('LoggedCustomer'))
        /** update Image */

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        let profile;
        const user_id = "{{ $profile_details->id }}";

        $('#file').change(function (e) {
            profile = e.target.files[0];
        })

        var image1 = $('#updateImage').prop('files')[0];


        $('#updateImage').change(function (e) {

            console.log(image1);

            profile = e.target.files[0];
            var formData = new FormData();
            formData.append('profile', profile);
            formData.append('user_id', user_id);
            $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: formData,
                url: "{{ route('customer.update_profile_picture') }}",
                success: function (response) {
                    if (response.success) {
                        $('#successMessage').show();
                        $('#successMessage').text(response.message);
                    } else {
                        $('#failedMessage').show();
                        $('#failedMessage').text(response.message);
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            });

        });

    @endif
</script>
@endsection
