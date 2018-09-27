@extends('base')

@section('content')
    <div class="js-products products">
        @if(!empty($section))
            @include('products.' . $section)
        @endif
    </div>
@endsection

@section('extraFooter')
    <link href="{{asset('css/products.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('js/products/index.js')}}"></script>
@endsection


