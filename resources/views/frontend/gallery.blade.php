@extends('frontend.layouts.master');
@section('title') Gallery @endsection

@section('content')

<main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Gallery</h2>
        </div>
    </div>

    <section id="events" class="events">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @foreach($galleries AS $key => $value)
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{$value->image}}" alt="{{$value->title}}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection