<div class="titleView">@if(empty($client)) New @else Edit @endif Client</div>
@if(!empty($errors))
    {{ session()->get('msg')}}
    <h4>{{$errors->first()}}</h4>
@endif
<form method="POST" class="js-formClient" action="{{route('clients.detailPost')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_num_old" value="@if(!empty($client['id_num'])){{$client['id_num']}}@endif">

    <fieldset class="fClear">
        <span class="name fLeft">DNI <span style="color:red">*</span> </span>
        <input type="text" name="id_num" value="@if(!empty($client['id_num'])){{$client['id_num']}}@endif">
    </fieldset>

    <fieldset class="fClear">
        <span class="name fLeft">Name <span style="color:red">*</span> </span>
        <input type="text fRight" name="name" value="@if(!empty($client['name'])){{$client['name']}}@endif">
    </fieldset>

    <fieldset class="fClear">
        <span class="name fLeft">Surname <span style="color:red">*</span> </span>
        <input type="text" name="surname" value="@if(!empty($client['surname'])){{$client['surname']}}@endif">
    </fieldset>

    <fieldset class="fClear">
        <span class="name fLeft">Email <span style="color:red">*</span> </span>
        <input type="text" name="email" value="@if(!empty($client)){{$client['id_num']}}@endif">
    </fieldset>

    <fieldset class="fClear">
        <span class="name fLeft">Phone <span style="color:red">*</span> </span>
        <input type="text" name="phone" value="@if(!empty($client)){{$client['id_num']}}@endif">
    </fieldset>

    <fieldset class="fClear">
        <span class="name fLeft">Address </span>
        <input type="text" name="address" value="@if(!empty($client)){{$client['id_num']}}@endif">
    </fieldset>

    <fieldset class="fClear">
        <span class="products fLeft">Product </span>
        <select name="products[]" class="js-multiSelect select" multiple>
            @if(!empty($products))
                @foreach($products as $k => $product)
                    <option value="{{$k}}" @if(!empty($client['products']) && in_array($k, $client['products'])) selected @endif>{{$product}}</option>
                @endforeach
            @endif
        </select>
    </fieldset>

    <div class="fieldInput">
        <input type="submit" class="buttonSubmit  fRight" value="Save">
    </div>
</form>

<div class="detail">
    @include('shared.backButton', ['route' => route('clients.index'), 'title' => 'Back to list'])
</div>

