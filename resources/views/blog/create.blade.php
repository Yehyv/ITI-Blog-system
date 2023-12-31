
<html>
    <head>
        <link href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 pt-2">
                    <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                    <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4 ">
                        <h1 class="display-4 d-flex justify-content-center">Create a New Post</h1>
                        <hr>
                        <form action="{{route('storePost')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="control-group col-12">
                                    <label for="title">Post Title</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                           placeholder="Enter Post Title" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="body">Post Body</label>
                                    <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body"
                                              rows="" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="control-group col-12 text-center">
                                    <button id="btn-submit" class="btn btn-primary">
                                        Create Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
