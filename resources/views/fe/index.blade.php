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

@section('myjs')
<script>
    $('.product__item__text a').click(function(e) {
        e.preventDefault(); // huỷ tác dụng thẻ a
        let pid = $(this).data('pid');
        let quantity = 1;
        //alert(quantity);
        const url = "{{ Route('addCart') }}";
        $.ajax({
            url: url,
            method: 'post',
            data: {
                pid: pid,
                quantity: quantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                alert("Add item to cart successfully.");
            }
        });
    });
</script>
@endsection