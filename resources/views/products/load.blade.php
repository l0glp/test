<div class="titleView">Products loader</div>

<form method="POST" action="{{route('products.loadPost')}}" enctype="multipart/form-data">
    <div class="divFileInput js-divFileInput">
        <span class="js-selectedFile selectedFile"> File must be json type </span>
        <label for="file" class="loadButton">Select file</label>
        <input id="file" type = "file" style="display:none" placeholder = "File must be json type" name="productFile" accept="application/JSON">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="fileContent" value="">
    </div>
    <div class="submitDiv">
        <input type="submit" class="buttonSubmit fRight disabled" disabled value="Load">
    </div>
</form>
<div class="load">
    @include('shared.backButton')
</div>
@if(!empty($errors))
    <h4>{{$errors->first()}}</h4>
@endif