@extends('frontend.layouts.master')
@section('title')
    @if ($page)
        {{ $page->meta_title }}
    @endif
@endsection

@section('meta_tags')
    @if ($page)
        <meta name="title" content="{{ $page->meta_title }}">
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
@endsection

@section('content')

@include('frontend.includes.header')

    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{ static_asset('assets/assets_web/img/about-banner2.jpg') }}); height:369px; background-position:right; background-repeat: no-repeat; background-size: cover; padding-top:239px"
        data-preset="{&quot;title&quot;:&quot;Breadcrumbs&quot;,&quot;category&quot;:&quot;header&quot;,&quot;reload&quot;:false,&quot;id&quot;:&quot;breadcrumbs&quot;}">
        <div class="container">
    <!---------------------close section-------------------->
    <!-----------------About ------------------------------->
    