@extends('fe.layout.layout')

@section('contents')
<!-- Hero Section Begin -->
@include('fe.index.hero')
<!-- Hero Section End -->

<!-- Banner Section Begin -->
@include('fe.index.banner')
<!-- Banner Section End -->

<!-- Product Section Begin -->
@include('fe.index.product')
<!-- Product Section End -->

<!-- Categories Section Begin -->
@include('fe.index.category')
<!-- Categories Section End -->

<!-- Instagram Section Begin -->
@include('fe.index.instagram')
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
@include('fe.index.latest_news')
<!-- Latest Blog Section End -->
@endsection