


<html>

    <head>
        <link href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.css')}}" rel="stylesheet">
    </head>
    <body>
        
        <div class="container" style="text-align:center; padding: 50px;">
            <div class="row">
                <div class="col-12 text-center pt-5">
                    <h1 class="display-one mt-5">Blog System</h1>
                    <p>This awesome blog has many articles, click the button below to see them</p>
                    <br>
                    {{--  <a href="/blog" class="btn btn-outline-primary">Show Blog</a>  --}}
                    <a  href="{{route('login')}}" class="btn btn-outline-primary">login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-danger">register</a>
                </div>
            </div>
        </div>
        </body>
</html>