<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>


        //get state city names from pin code
            function get_state_city(){
                var pincode = jQuery('#pincode').val();
                if(pincode==''){
                    jQuery('#city').val('');
                    jQuery('#state').val('');
                    document.getElementById("wrong_pincode").innerHTML="";
                }else{
                    jQuery.ajax({
                        url:'{{route('getPinCodeDetails')}}',
                        type:'post',
                        data:'pincode='+pincode+'&_token={{csrf_token()}}',
                        success:function(data){
                            if(data=='no'){
                                // alert('Wrong Pincode');
                                document.getElementById("wrong_pincode").innerHTML="Wrong Pincode.";
                                jQuery('#city').val('test');
                                jQuery('#state').val('');
                            }else{
                                var getData=$.parseJSON(data);
                                //alert(getData.city);
                                //alert(getData.state);
                                $('#city').val(getData.city);
                                $('#state').val(getData.state);
                                // $("#city").val('getData.city');
                                // $("#state").val('getData.state');
                                document.getElementById("cityid").value = getData.city;
                                document.getElementById("stateid").value = getData.state;
                                // document.getElementById("city").value = "Patna";
                                document.getElementById("wrong_pincode").innerHTML="";
                            }
                        }
                    });
                }
           }


    /* show price quote */
    $(document).ready(function() {
		var category_id = {{ serviceCategoryList()[0]->id }};
		showPriceQuoteDetails(category_id);
	});


	function showPriceQuoteDetails(category_id){
		$.ajax({
			url: '{{ route('home.showServiceCategoryDetails') }}',
			type: 'post',
			data:'category_id='+category_id+'&_token={{csrf_token()}}',
			success:function(response){
				// console.log(response);
				$('.show-service-category-table').html(response);
			}
		})
	}




	$(document).ready(function() {
		var product_id = {{ commonFaqCategory()[0]->id }};
		showCommonFaq(product_id);
	});


	function showCommonFaq(product_id){
		$.ajax({
			url: '{{ route('home.showCommonFaqList') }}',
			type: 'post',
			data:'product_id='+product_id+'&_token={{csrf_token()}}',
			success:function(response){
				//console.log(response);
				$('#vsaccordions').html(response);
			}
		})
	}



// email subscribe
$(".SubscribeBtn").click(function(e){
    e.preventDefault();
    // var data = $(this).serialize();
    var email =  $('#email_subscribe').val();

    if(email!==''){
        var url = '{{ route('store.subscriber') }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:url,
            method:'POST',
            data:{
                email:email,
            },
            success:function(response){
                toastr.success("You have subscribed successfully!");
                // toastr.success(response.msg);
               $('#email_subscribe').val('');

            },
            error:function(error){
                console.log(error)
            }
        });
    }else{
        toastr.danger("Email is Required!");
    }
});
// email subscribe



		$('#country_id').on('change', function() {
            var country_id = this.value;
            // alert(country_id);
            $("#state_id").html('');
            $.ajax({
                url: "{{ url('get-states-by-country') }}",
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state_id').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        $("#state_id").append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                    $('#city-dropdown').html('<option value="">Select State First</option>');
                }
            });
        });


        $('#state_id').on('change', function() {
            var state_id = this.value;
            $("#city_id").html('');
            $.ajax({
                url: "{{ url('get-cities-by-state') }}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#city-dropdown').html('<option value="">Select City</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });




</script>


<script src="{{ static_asset('assets/assets_web/js/jquery-3.6.1.min.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script> -->
<script src="#https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ static_asset('assets/assets_web/js/bootstrap.js')}}"></script>
<script src="{{ static_asset('assets/assets_web/js/owl.carousel.min.js')}}"></script>
<script src="{{ static_asset('assets/assets_web/js/table.js')}}"></script>
<script src="{{ static_asset('assets/assets_web/js/script.js')}}"></script>
<script src="{{ static_asset('assets/assets_web/js/main.js')}}"></script>




  <!--<script src="https://code.jquery.com/jquery-3.6.1.js" ></script>-->

<!-- Toastr JS File -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
//   AOS.init();

  $(document).ready(function() {
            toastr.options.timeOut = 5000;
            @if (Session::has('alert-danger'))
                toastr.error('{{ Session::get('alert-danger') }}');
            @elseif(Session::has('alert-success'))
                toastr.success('{{ Session::get('alert-success') }}');
            @elseif(Session::has('alert-warning'))
                toastr.success('{{ Session::get('alert-warning') }}');
            @endif
        });

</script>

@yield('script')
