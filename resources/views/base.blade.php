<!DOCTYPE html>
<html>
    <head>
        <title>Application</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('js/index.js')}}"></script>
        <link href="{{asset('css/index.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="titleContent">Application Manager</div>
        </header>
        <div class="body">
            <div class="bodyContent">
                @yield('content')
            </div>
        </div>
        <footer>
            <div class="titleContent">
                <span class="littleText"> Created by: Lorena González </span>
                <a class="linkButton" title="LinkedIn" target="_blank" href="https://www.linkedin.com/in/lorena-gonz%C3%A1lez-pascual-8a5b0988/"><i class="fab fa-linkedin-in"></i></a>
            </div>
            @yield('extraFooter')
        </footer>
    </body>

</html>