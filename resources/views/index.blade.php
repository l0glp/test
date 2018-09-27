@extends('base')

@section('content')
    <div class="title"> Welcome to the application, manage your own products and clients</div>
    <div class="subtitle"> What would you like to do?</div>
    <div class="optionMenu">
        <ul>
            <li><a class="js-viewProducts optionButton" href="{{route('products.index')}}"> Show products list</a></li>
            <li><a class="js-viewClients optionButton" href="{{route('clients.index')}}"> Show client list</a></li>
            <li><a class="js-loadProducts optionButton" href="{{route('products.load')}}"> Load products</a></li>
        </ul>
    </div>
@endsection

