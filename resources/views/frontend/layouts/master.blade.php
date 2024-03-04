<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('meta_tags')

        <title>@yield('title')</title>


		@include('frontend.includes.link')
		<!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MFCR6XXW');</script>
        <!-- End Google Tag Manager -->

        <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFCR6XXW"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHa4Aw7FcBvI9iLQknt_aWHP7CAowmQzs&amp;libraries=places&amp;language=en"></script> --}}
        {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHa4Aw7FcBvI9iLQknt_aWHP7CAowmQzs&callback=gmNoop"></script> --}}
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHa4Aw7FcBvI9iLQknt_aWHP7CAowmQzs&amp;libraries=places&amp;language=en"></script>
   </head>


	<body class="">
   <div class="main-wrapper {{ Request::is('login') ? 'logins':'' }} {{ Request::is('register') ? 'logins':'' }}">


		@yield('content')

		@include('frontend.includes.footer')
		@include('frontend.partials.popup')




   </div>


   @include('frontend.includes.script')
   <script>

    $(".SubscribeBtn").click(function(e){
                e.preventDefault();
                // var data = $(this).serialize();
                var email =  $('#email_subscribe').val();

                if(email!==''){
                    var url = '{{ route('subscribers.store') }}';
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
                            console.log(response);
                            toastr.success("You have subscribed successfully!");
                            $('#email_subscribe').val('');

                        },
                        error:function(error){
                            console.log(error)
                        }
                    });
                }else{
                    toastr.error("Email is Required!");
                }
            });
            // email subscribe

    var input = document.getElementById('autocomplete_ranas');
    var autocomplete = new google.maps.places.Autocomplete(input);
    // var autocomplete = new google.maps.places.Autocomplete(input,{types: ['(cities)']});
    google.maps.event.addListener(autocomplete, 'place_changed', function(){
       var place = autocomplete.getPlace();
    })



  </script>


</body>






</html>

