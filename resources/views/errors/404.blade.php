<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      @yield('meta_tags')
		@include('frontend.includes.link')
   </head>
   <body>
        @include('frontend.includes.header')
        
        <div class="container">
            <img src="{{ static_asset('assets/404.jpg')}}" style="max-width: 100%; height: auto; margin-top:100px;">
        </div>

        @include('frontend.includes.footer')
        @include('frontend.includes.script')
    </body>
</html>