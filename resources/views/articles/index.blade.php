@extends("layouts.app")
@section("content");
<div class="container">
    @if(session('info'))
    <div class="alert alert-success">
        {{session("info")}}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{session("success")}}
    </div>
    @endif
    {{$articles->links()}}
    @foreach($articles as $article)
    <div class="card  mb-2">
        <div class="card-body">
            <h5 class="card-title">{{$article['title']}}</h5>
            <div class="small text-muted card-subtitle">
                {{$article->created_at->diffForHumans()}}
                <b>{{$article->category->name}}</b>


            </div>

            <div class="text-success"><b>
                {{$article->user->name}}</b></div>

            <div class="text-center">

                @if($article->image != 'default.jpg')
                <img style="width:50%" src="{{ asset('storage/'.$article->image) }}"  class="img-fluid mb-2">
            @endif
            </div>
            <p class="card-text">{{$article->body}}</p>
            <a href="{{url("/articles/detail/$article->id")}}">See More</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
