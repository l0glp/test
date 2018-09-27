<div class="backButton">
    <a href="@if(!empty($route)) {{$route}} @else {{route('index')}} @endif">@if(!empty($title)) {{$title}} @else Back to Menu @endif</a>
</div>