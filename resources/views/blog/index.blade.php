
<html>
    <head>
    <link href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.css')}}" rel="stylesheet">
    </head>
        <body>
            
    <div class="container ">
        <div class="row ">
            <div class="col-12 pt-2 " >
                 <div class="row d-flex" style="align-items: center">
                    <div class="col-8 ">
                        <h1 class="display-one" >Welcome to Our Blog System!</h1>
                        <p class="d-flex align-items-center" >Enjoy reading our posts. Click on a post to read!</p>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                           
                                
                                    <a href="{{ route('logout' )}}"  onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger">logout</a>
                        </form>

                    </div>
                    
                    <div>
                        <form class="form-inline md-form mr-auto mb-4  d-flex align-items-center" method="POST">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                            
                            <a href="{{route('showPost','10')}}" class="btn btn-primary " >Search</a>
                          </form>
                    </div>
                    
                    <!-- <div class="col-4">
                        <p>Create new Post</p>
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                        <br>
                        <br>
                    </div> -->
                </div>    
                
                <div class="d-flex align-items-end flex-column">
                    <a href="{{route('index')}}" class="btn btn-primary " style="margin-bottom: 5px; ">Create Post</a>
                </div>
                
                @forelse($posts as $post)
                <div class="card">
                <div class="card-header">
                    User name
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                    <p class="card-text">{{ $post->body }}</p>
                    <a href="{{route('editPost',$post->id)}}" class="btn btn-primary">Edit Post</a>
                    <form id="delete-frm" class="btn " action="{{route('deletePost',$post->id)}}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')" >Delete Post</button>
                    </form>
                    {{-- <a href="#" class="btn btn-danger" >Delete</a> --}}
                </div>
                </div>
                    <!-- <ul>
                        <li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul> -->
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
                
                <div class="mt-2" >
                    {{$posts->links("pagination::bootstrap-5")}}
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
