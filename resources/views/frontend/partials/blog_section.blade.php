@if(count(latestPostList())>0)
<section class="blogs-service-section">
    <div class="container">
        <div class="section-heading section-heading-six">
            <div class="row align-items-end">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="reason-six">
                        <img src="{{ static_asset('assets/assets_web/img/icons/affordable.png') }}" alt="img"
                            style="height: 50px;">
                        <h5>Our Latest Blog</h5>
                    </div>
                    <h2>Latest <span>Blog</span></h2>
                </div>
                <div class="col-md-6 aos" data-aos="fade-up">
                    <a href="{{ url('blogs') }}" class="afford-btn">Explore All</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach(latestPostList() as $key => $value)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="service-widget service-six aos" data-aos="fade-up">
                            <div class="service-img">
                                <a href="service-details.php">
                                    <img class="serv-img" alt="Service Image"
                                        src="{{ static_asset($value->blog_image) }}" style="height: 200px; width: 100%;">
                                </a>
                            </div>
                            <div class="service-content service-content-six">
                                <div class="latest-blog-six">
                                    <div class="latest-blog-content">
                                        <h5>{{ convert_datetime_to_date_format($value->created_at, 'd M Y') }}</span>
                                        </h5>
                                    </div>
                                    {{-- <div class="latest-profile-name">
                                        <img src="{{ static_asset('assets/assets_web/img/profiles/avatar-10.jpg') }}"
                                            alt="">
                                        <h6>Annie Oakley</h6>
                                    </div> --}}
                                </div>
                                <h5 class="blog-import-service">{{ $value->title }}</h5>
                                {!! \Illuminate\Support\Str::limit($value->description ?? '', 100, ' ...') !!}
                                <a href="{{ route('blog.detail',$value->slug) }}" class="bt-hover mt-3 d-inline-block">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</section>
@endif
