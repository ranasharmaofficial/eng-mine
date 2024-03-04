@extends('frontend.layouts.master');
@section('title') {{$post->meta_title}} @endsection

@section('meta_tags')
  <meta name="title" content="{{$post->meta_title}}">
  <meta name="keywords" content="$post->meta_tag">
  <meta name="description" content="$post->meta_description">
@endsection


@section('content')

@include('frontend.includes.header')

		<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{ static_asset('assets/assets_web/img/server-sevice.png')}}); height:369px; background-repeat: no-repeat; background-size: cover; padding-top:239px">
            <div class="container">
               <div>
                  <h2 class="breadcrumbs-custom-title text-dark">{{$post->meta_title}}</h2>
                  <ul class="breadcrumbs-custom-path">
                     <li><a href="{{ url('') }}">Home<i class="fa fa-arrow-right px-2" aria-hidden="true"></i></a></li>
                     <li class="active" style="color:#ff008a;">{{$post->meta_title}}</li>
                  </ul>
               </div>
            </div>
         </section>

		<div class="content">
			<div class="container">
						
				<div class="row">
				
					<div class="col-lg-8 col-md-12 blog-details ">
					
						<div class="blog-head">
							<div class="blog-category">
								<ul>
									<li><span class="cat-blog">Construction</span></li>
								</ul>
							</div>	
							<h3>{{$post->title}} </h3>	
							<div class="blog-category sin-post">
								<ul>
									<li><i class="feather-calendar me-1"></i>8 Sep 2023 </li>
									<li>
										<div class="post-author">
											<a href="#"><img src="{{ static_asset('assets/assets_web/img/profiles/avatar-02.jpg')}}" alt="Post Author"><span>Admin</span></a>
										</div>
									</li>
								</ul>							
							</div>
						</div>

						<!-- Blog Post -->
						<div class="blog blog-list">
							<div class="blog-image">
								<a href="javascript:void(0)"><img class="img-fluid" src="{{ static_asset($post->blog_image) }}" alt="Post Image"></a>
							</div>
							<div class="blog-content">
							{!! $post->description !!}
							</div>
						</div>
						<!-- /Blog Post -->
						
						<div class="social-widget blog-review d-none">
							<h4>Tags</h4>
							<div class="ad-widget">
								<ul>
									<li>
										<a href="javascript:void(0);">Construction</a>
									</li>
									<li>
										<a href="javascript:void(0);">Car Wash</a>
									</li>
									<li>
										<a href="javascript:void(0);">Appliance</a>
									</li>
									<li>
										<a href="javascript:void(0);">Interior</a>
									</li>
									<li>
										<a href="javascript:void(0);">Carpentry</a>
								</ul>
							</div>
						</div>
						
						<!-- Reviews -->
						<div class="service-wrap blog-review d-none">
							<h4>Comments</h4>
							<ul>
								<li>
									<div class="review-box">
										<div class="review-profile">
											<div class="review-img">
												<img src="assets/img/profiles/avatar-02.jpg" class="img-fluid" alt="img">
												<div class="review-name">
													<h6>Dennis</h6>
													<p>a week ago</p>
												</div>
											</div>
											<a href="javascript:void(0);" class="reply-box"><i class="fas fa fa-reply me-2"></i> Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
										<div class="new-comment reply-com">
											<form>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Name*</label>
															<input type="text" class="form-control" placeholder="Enter Your Name">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Email*</label>
															<input type="email" class="form-control" placeholder="Enter Email Address">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Website</label>
															<input type="email" class="form-control" placeholder="Enter Your Website">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-form-label">Message*</label>
															<textarea rows="4" class="form-control" placeholder="Enter Your Comment Here...."></textarea>
														</div>
													</div>
													<div class="submit-section">
														<button class="btn btn-primary submit-btn" type="submit">Send Message</button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<ul class="comments-reply">
										<li>
											<div class="review-box">
												<div class="review-profile">
													<div class="review-img">
														<img src="assets/img/profiles/avatar-02.jpg" class="img-fluid" alt="img">
														<div class="review-name">
															<h6>Dennis</h6>
															<p>a week ago</p>
														</div>
													</div>
													<a href="javascript:void(0);" class="reply-box"><i class="fas fa fa-reply me-2"></i> Reply</a>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
											</div>
										</li>
									</ul>
								</li>
								<li>
									<div class="review-box">
										<div class="review-profile">
											<div class="review-img">
												<img src="assets/img/profiles/avatar-03.jpg" class="img-fluid" alt="img">
												<div class="review-name">
													<h6>Jaime</h6>
													<p>a week ago</p>
												</div>
											</div>
											<a href="javascript:void(0);" class="reply-box"><i class="fas fa fa-reply me-2"></i> Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
										<div class="new-comment reply-com">
											<form>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Name*</label>
															<input type="text" class="form-control" placeholder="Enter Your Name">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Email*</label>
															<input type="email" class="form-control" placeholder="Enter Email Address">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Website</label>
															<input type="email" class="form-control" placeholder="Enter Your Website">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-form-label">Message*</label>
															<textarea rows="4" class="form-control" placeholder="Enter Your Comment Here...."></textarea>
														</div>
													</div>
													<div class="submit-section">
														<button class="btn btn-primary submit-btn" type="submit">Send Message</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</li>
								<li>
									<div class="review-box">
										<div class="review-profile">
											<div class="review-img">
												<img src="assets/img/profiles/avatar-07.jpg" class="img-fluid" alt="img">
												<div class="review-name">
													<h6>Joseph</h6>
													<p>a week ago</p>
												</div>
											</div>
											<a href="javascript:void(0);" class="reply-box"><i class="fas fa fa-reply me-2"></i> Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
										<div class="new-comment reply-com">
											<form>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Name*</label>
															<input type="text" class="form-control" placeholder="Enter Your Name">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Email*</label>
															<input type="email" class="form-control" placeholder="Enter Email Address">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="col-form-label">Website</label>
															<input type="email" class="form-control" placeholder="Enter Your Website">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="col-form-label">Message*</label>
															<textarea rows="4" class="form-control" placeholder="Enter Your Comment Here...."></textarea>
														</div>
													</div>
													<div class="submit-section">
														<button class="btn btn-primary submit-btn" type="submit">Send Message</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- /Reviews -->
						
						<!-- Comments -->
						<div class="new-comment d-none">
							<h4>Write A Comments</h4>
							<form>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											
											<input type="text" class="form-control" placeholder="Enter Your Name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											
											<input type="email" class="form-control" placeholder="Enter Email Address">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											
											<textarea rows="6" class="form-control" placeholder="Enter Your Comment Here...."></textarea>
										</div>
									</div>
									<div class="submit-section">
											<button class="btn btn-primary submit-btn" type="submit">Send Message</button>
													</div>
								</div>
							</form>
						</div>
						<!-- /Comments -->
				
					</div>
					
					<!-- Blog Sidebar -->
					<div class="col-lg-4 col-md-12 blog-sidebar theiaStickySidebar">

						<!-- Search -->
						<div class="card search-widget">
							<div class="card-body">
								<form class="search-form">
									<div class="input-group">
										<input type="text" placeholder="Search..." class="form-control">
										<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
									</div>
								</form>
							</div>
						</div>
						<!-- /Search -->
						
						<!-- Categories -->
						<div class="card about-widget d-none">
							<div class="card-body">
								<h4 class="side-title">About Me</h4>
								<img src="assets/img/server-repair.jpg" alt="">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
								<div class="submit-section-2">
										<button class="btn btn-primary submit-btn" type="submit">Post Comment</button>
									</div>
							</div>
						</div>
						<!-- /Categories -->

						<!-- Categories -->
						<div class="card category-widget">
							<div class="card-body">
								<h4 class="side-title">Categories</h4>
								<ul class="categories">									
									<li><a href="javascript:void(0)">Hire Onsite L1 Engineer</a></li>
									<li><a href="javascript:void(0)">Installation & Configuration</a></li>
									<li><a href="javascript:void(0)">Upgrade & Migratior</a></li>
								</ul>
							</div>
						</div>
						<!-- /Categories -->

						<!-- Latest Posts -->
						<div class="card post-widget">
							<div class="card-body">
								<h4 class="side-title">Latest News</h4>
								<ul class="latest-posts">
								
						
								@foreach($recent_posts as $key => $value)
									<li>
										<div class="post-thumb">
											<a href="{{ route('blog.detail',$value->slug) }}">
												<img class="img-fluid" src="{{ static_asset($value->blog_image) }}" alt="">
											</a>
										</div>
										<div class="post-info">
											<p>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</p>
											<h4>
												<a href="">{{ $value->title }}</a>
											</h4>
										</div>
									</li>
								@endforeach
									
								</ul>
							</div>
						</div>
						<!-- /Latest Posts -->

					@if($post->tags != [])
						<!-- Tags -->
						<div class="card tags-widget">
							<div class="card-body">
								<h4 class="side-title">Tags</h4>
								<ul class="tags">
									@foreach(json_decode($post->tags) as $key => $value)
										<li><a href="#" class="tag">{{$value}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					@endif	
					 
					 
						<!-- /Tags -->
						
						<!-- Archives -->
						<div class="card widget widget-archive mb-0">
							<div class="card-body">
								<h4 class="side-title">Archives</h4>
									<ul>
										<li><a href="javascript:void(0);">January 2023</a></li>
									</ul>
							</div>
						</div>
						<!-- /Archives -->
						
					</div>
					<!-- /Blog Sidebar -->
					
				</div>
			</div>		
		</div>	
		

@if(false)
<div class="banner-main position-relative py-5 h-470" Style="background-image:url({{ static_asset('assets/assets_web/img/bg-home1.webp') }});">
			<div class="container h-100">
			 <nav aria-label="breadcrumb" class=" h-100 w-100 d-flex align-items-center justify-content-start pt-5 mt-5">
			<div class="w-100 d-flow-root ">
				  <h5 class="text-white d-block fs-2 w-100 mb-2">{{ $post->title }}</h5>
				  <span class="widget_title bg-white"></span>
				  <ol class="breadcrumb w-auto badge bg-light-transparent text-dark py-2 px-3 mt-2 mb-0">
					<li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="{{ url('') }}" class="text-white fs-15">Home</a></li>
					<li class="breadcrumb-item text-white float-start d-inline-block py-1 fw-normal"><a href="{{ url('blogs') }}" class="text-white fs-15">Blog</a></li>
					<li class="breadcrumb-item active text-white fs-15 float-start d-inline-block py-1 fw-normal" aria-current="page">{{ $post->title }}</li>
				  </ol>
			</div>
			</nav>
         </div>
      </div>
      <section class="blog-area py-5 company-core-value2 position-relative">
         <div class="container-fluid px-5 position-relative z-index-99">

            <div class="row">
               <div class="col-xl-9 col-lg-9 col-md-12">
                  <div class="blog-inners">
				  {{--<h6 class=" pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-start"> Handflul Of  <span class="text-sky   fs-25 ">  Model Structures</span></h6>--}}
					{{ $post->title }}
                     <div class="single-post-header fl-wrap mt-0 d-flex justify-content-between align-items-center  pb-3 border-top pt-3 mb-3">
                        <div class="author-link d-inline-flex align-items-center">
                           <a href="javascript:void(0);">
                           <img src="{{ static_asset('assets/assets_web/img/contact-us.webp') }}" alt="Orrish" class=" w-30px h-30px rounded-circle"> <span class="fs-13 pb-2 text-black mb-0 fw-normal ms-1">Posted by : Admin</span></a>
                           <span class="post-date  mx-2  fs-13 d-inline-block align-items-center text-black mb-0 fw-normal"><i class="bi bi-clock fs-18 text-skype"></i> Updated {{ convert_datetime_to_date_format($post->created_at, 'd-M-Y') }}</span>
                        </div>
                        <ul class="post-opt d-flex align-items-center list-group-horizontal list-group">
                           <li class="list-group-item fs-13 lsp-5 text-sky"><i class="bi bi-chat-left-text"></i> 4 </li>
                           <li class="list-group-item fs-13 lsp-5 text-sky"><i class="bi bi-eye"></i> 980 </li>
                        </ul>
                     </div>
                     <img class="blog-img w-100 h-400 rounded  bg-light border-sky-light border p-1" src="{{ static_asset($post->blog_image) }}" alt="img1">
                     <div class="base-header2 mb-4 mt-4">
                        <!--<h3 class="text-start lsp-5 lh-base text-uppercase fs-18 text-sky fw-bold lsp-5px pt-3">
                           Latest Blogs1 Detail
                           </h3>-->
                          {!! $post->description !!}
                     </div>
                     <div>


                     </div>
                     <h3 class="text-start lsp-5 lh-base text-capitalize fs-16 text-black fw-bold lsp-5px pb-2 mt-3">Comments</h3>
                     <div class="comment-section w-100  bg-white   shadow-5  p-4 rounded mb-3">
                        
						<div id="show_comments">
							
						</div>
						 
                     </div>

                     <form id="contact-form1" name="contact_form" class="default-form mt-1 shadow-5 bg-white p-3 rounded" action="" method="post" novalidate="novalidate">
                        <h3 class="text-start lsp-5 lh-base text-capitalize fs-16 text-black fw-bold lsp-5px pb-2 ">
                           Leave a Reply
                        </h3>
                        <div class="row clearfix">
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group mb-3">
                                 <input type="text" id="name" name="name" class="form-control rounded-pill border border-gray fs-13 lsp-5 py-2 required email" value="" placeholder="Your Name" required="" aria-required="true">
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group mb-3">
                                 <input type="email" id="email" name="email" class="form-control rounded-pill border border-gray fs-13 lsp-5 py-2" value="" placeholder="Your Email">
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group mb-3">
                                 <textarea name="form_message" id="comment" class="form-control rounded-3 border border-gray fs-13 lsp-5 py-2 textarea required" placeholder="Your Message...." aria-required="true"></textarea>
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group center">
                                 <input id="form_botcheck2" name="form_botcheck" class="form-control" type="hidden" value="">
                                 <button id="postComment" class="thm-btn style-2 btn bg-sky px-2 py-2 fs-13 text-white text-center rounded-3 border-0 lsp-5 text-capitalize" type="submit" data-loading-text="Please wait...">send a comment </button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-12">
                  <div class="form-right-box text-center bg-white p-3 rounded-3 shadow-5 text-center mb-3">
                     <h6 class=" pb-0 fs-16 fw-bold lsp-5 text-black text-capitalize text-start"> Recent  <span class="text-sky   fs-16 ">Blog</span></h6>
                     <ul class="list-group mt-0 mb-2 text-start">

						@foreach($recent_posts as $key => $value)
							<a href="{{ route('blog.detail',$value->slug) }}">
								<li class="list-group-item border-0 px-0 d-flex align-items-center pb-0">
								   <img src="{{ static_asset($value->blog_image) }}" alt="Awesome Image" class="w-70px h-70px mb-2  mx-1 border-skype p-1 shadow rounded">
								   <div class=" ps-2 w-75">
									  <span class="fs-13 lsp-5 text-black fw-bold d-block white-space  text-capitalize pb-0">{{ $value->title }}</span>
									  <p class="d-block justify-content-between mb-0 w-100 fs-11 fw-bold my-1"><i class="bi bi-calendar3 text-sky"></i> {{ convert_datetime_to_date_format($value->created_at, 'd M Y') }} <span class="fs-11"><i class="bi bi-person text-sky"></i> By Admin</span></p>
									  {!! \Illuminate\Support\Str::limit($value->description ?? '',100,' ...') !!}
								   </div>
								</li>
							</a>
						@endforeach

                     </ul>
                  </div>
                  <div class="form-right-box text-center  bg-white p-3   rounded-3 shadow-5 text-center    mb-3">
                     <h6 class=" pb-0 fs-16 fw-bold lsp-5 text-black text-capitalize text-start"> Popular  <span class="text-sky   fs-16 ">Blog</span></h6>
                     <ul class="list-group mt-0 mb-0 text-start">
                        @foreach($recent_posts as $key => $value)
							<li class="list-group-item border-0 border-bottom px-0">
							   <div class=" ps-2 w-100">
								  <span class="fs-13 lsp-5 text-black fw-bold d-block text-capitalize white-space">{{ $value->title }}</span>
								  <p class="d-flex justify-content-start mb-0 w-100 fs-11 fw-bold my-1 text-muted"><span class="fs-11 text-muted"><i class="bi bi-calendar3  text-sky"></i> {{ convert_datetime_to_date_format($value->created_at, 'd M Y') }} </span>
									 <span class="fs-11 ms-3 text-muted"> <i class="bi bi-person  text-sky"></i> By Admin</span>
								  </p>
								  {!! \Illuminate\Support\Str::limit($value->description ?? '',100,' ...') !!}
							   </div>
							</li>
						@endforeach

                     </ul>
                  </div>


					@if($post->tags != [])
					  <div class="form-right-box text-start bg-white p-3 rounded-3 shadow-5   mb-3">
						 <h6 class=" pb-0 fs-16 fw-bold lsp-5 text-black text-capitalize text-start"> Tags  <span class="text-sky   fs-16 ">Topics</span></h6>
						 <div class="img-box mt-2 text-start">
							@foreach(json_decode($post->tags) as $key => $value)
								<a class="w-auto border py-1 px-2 rounded-pill fs-13 lsp-5 text-muted mb-2 me-1 d-inline-block" href="javacript:void();">{{$value}} </a>
							@endforeach
						</div>
					  </div>
					 @endif
               </div>
            </div>
         </div>
      </section>
      <!--footer-->
@endif

@endsection

@section('script')
    <script type="text/javascript">
        $( document ).ready(function() {
            show_blog_comment();
        });

        //Store Comment in db
        $("#postComment").click(function (event) {
            event.preventDefault();
            var comment = $('#comment').val().trim();
            var name = $('#name').val().trim();
            var email = $('#email').val().trim();
            if(comment == ""){
                toastr.warning("Comment box is required.");
            }
            var blog_id = {{$post->id}};

            $.ajax({
                url: "{{url('blog/store_comment')}}",
                type: "POST",
                data: {
                    blog_id: blog_id,
                    comment: comment,
                    name: name,
                    email: email,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',

                success: function (result) {
					console.log();
                    $('#comment').val("");
                    $('#name').val("");
                    $('#email').val("");
                    toastr.success("Your comment successfully added. Please wait for Admin approval.");
                }
            });
        })

        function show_blog_comment(){
            var blog_id = {{$post->id}};
            $.ajax({
                url: "{{ url('blog/show_comments') }}",
                type: "GET",
                data: {
                    blog_id: blog_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                     console.log(result);
                    $('#show_comments').html(result.data);
                }
            });
        }

    </script>
@endsection
