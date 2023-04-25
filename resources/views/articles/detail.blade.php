@extends("layouts.app")
@section("content");
<div class="container">
    <!-- your existing code here -->

    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{$article['title']}}</h5>
            <div class="small text-muted card-subtitle">
                {{$article->created_at->diffForHumans()}}
                <div class="text-success">

                    <b>
                    <div class="text-success"> {{$article->user->name}}</div>
                    <b>{{$article->category->name}}</b>


                    </b>

                </div>
            </div>
            <div class="text-center">
                @if($article->image != 'default.jpg')
                <img style="width:50%" src="{{ asset('storage/'.$article->image) }}" alt="{{$article['title']}}" class="img-fluid">
            @endif
            </div>
            <p class="card-text">{{$article->body}}</p>
            <a class="btn btn-success text-white"  href="{{url("articles/edit/$article->id")}}">edit</a>

            <a href="{{url("articles/delete/{$article->id}")}}" class="btn btn-danger">del</a>


            <!-- your existing code here -->
        </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item ">
            <b>Comments ({{count($article->cmms)}})</b>


        </li>
        @foreach($article->cmms as $comment)
        <li class="list-group-item">
            <b class="text-success">{{$comment->user->name}}</b>

            {{$comment->content}}
            <a href="{{url("/articles/comment/delete/$comment->id")}}"> del</a>
            <a href="{{url("/articles/detail/comments/edit/$comment->id")}}">Edit</a>

            <div class="small mt-2">
               {{-- <b>
                by {{$comment->user->name}}
                </b> --}}
                {{$comment->created_at->diffForHumans()}}
            </div>
        </li>
        @endforeach
    </ul>

    @auth
    <form action="{{url("articles/comment/create")}}">
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <textarea name="content" class="form-control mb-2" placeholder="Comment"></textarea>

        <button class="btn btn-primary">add Comment</button>
    </form>

    @endauth

    <!-- your existing code here -->
</div>
@endsection
