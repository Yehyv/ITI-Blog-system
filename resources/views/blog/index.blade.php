<html>
    <head>
    <link href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    </head>
        <body>
            
    <div class="container ">
        <div class="row ">
            <div class="col-12 pt-2 " >
                 <div class="row d-flex align-items-center" >
                    <div class="col-12 ">
                        <h1 class="center" >Welcome to Our Blog System!</h1>
                        <p class="d-flex align-items-center" >Enjoy reading our posts. Click on a post to read!</p>
                        <form action="{{ route('logout') }}" method="POST" >
                            @csrf
                           
                                
                                    <a href="{{ route('logout' )}}"  onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger" >Logout</a>
                        </form>

                    </div>
                    
                            
                    
                    
                    <div>
                        <form class="form-inline md-form mr-auto mb-4  d-flex align-items-center" action="{{route('Search')}}" method="POST">
                            @csrf
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="search" name="search">
                            
                            <button class="btn btn-primary" type="submit">Search</button>
                          </form>
                    </div>
                    
                    {{--  <!-- <div class="col-4">
                        <p>Create new Post</p>
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                        <br>
                        <br>
                    </div> -->  --}}
                </div>    
                
                @if(Session::has('message'))
                  <p class="alert alert-info">{{ Session::get('message') }}</p>
                  @endif
                <div class="d-flex align-items-end flex-column">
                    <a href="{{route('createPost')}}" class="btn btn-primary " style="margin-bottom: 5px; ">Create Post</a>
                </div>
                @forelse($posts as $post)
                <div class="card">
                <div class="card-header">
                    <div class="row ">
                        <div class="col">{{$post->User->name}}</div>
                        <div class="col d-flex justify-content-end">{{$post->created_at->format('h:i:s d-m-Y')}}</div>

                    </div>                    
                    
                </div>
                
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 25px">{{ ucfirst($post->title) }}</h5>
                    <p class="card-text" style="font-size: 20px">{{ $post->body }}</p>
                    <div class="row">
                        <div class="col">
                            @if($post->comments->count()!=0)
                            
                                @foreach($post->comments as $comments)
                                <div class="card mb-4">
                            <div class="card-body">
                                
                               
                                <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="fa-solid fa-user fa-xl" ></i>
                                    <p class="small mb-0 ms-2" style="font-size: 15px">{{$comments->user->name}}</p>
                                    
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    @if(auth()->User()->id == $comments->user_id)
                                        <form id="delete-frm" class="btn " action="{{route('deleteComment',$comments->id)}}" method="POST" style="margin-top: 17.5px" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')" ><i class="fas fa-trash-can"></i></button>
                                        </form>
                                        
                                    @endif
                                    
                                        
                                    
                                    
                                    {{--  <p class="small text-muted mb-0">Upvote?</p>
                                    <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                    <p class="small text-muted mb-0">3</p>  --}}
                                </div>
                                </div>
                                <p>{{$comments->content}}</p>
                            </div>
                            </div>
                                @endforeach
                                <div class="col-md-8 col-lg-12">
                                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                      <div class="card-body p-4">
                                        <div class="form-outline mb-12">
                                          <form action="{{route('storeComment')}}" method="POST">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <input type="hidden" id="post_id" class="form-control" name="post_id" value={{$post->id}} placeholder="Type post id cxcv..." />
                                            <input type="text" id="addANote" class="form-control" name="content" placeholder="Type comment..." />
                                            <button id="btn-submit" class="btn btn-primary" style="margin-top: 5px">
                                              Add Comment
                                          </button>
                                          {{-- <a href="{{route('storeComment')}}" class="btn btn-primary" >Add Comment</a> --}}
                                            <br>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @else
                                    <div class="col-md-8 col-lg-12">
                                        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                          <div class="card-body p-4">
                                            <div class="form-outline mb-4">
                                              <form action="{{route('storeComment')}}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <input type="hidden" id="post_id" class="form-control" name="post_id" value={{$post->id}} placeholder="Type post id cxcv..." />
                                                <input type="text" id="addANote" class="form-control" name="content" placeholder="Type comment..." />
                                                <button id="btn-submit" class="btn btn-primary">
                                                  Add Comment
                                              </button>
                                              {{-- <a href="{{route('storeComment')}}" class="btn btn-primary" >Add Comment</a> --}}
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif    
                        </div>
                    </div>
                    @if(auth()->User()->id == $post->user_id)
                        <a href="{{route('editPost',$post->id)}}" class="btn btn-primary">Edit Post</a>
                        
                        <form id="delete-frm" class="btn " action="{{route('deletePost',$post->id)}}" method="POST" style="margin-top: 17.5px" >
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')" >Delete Post</button>
                        </form>
                    @endif
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
    <script src="{{asset('bootstrap-5.3.1-dist/js/bootstrap.js')}}"></script>
</body>
</html>
