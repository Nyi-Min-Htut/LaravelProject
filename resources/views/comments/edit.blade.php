@extends("layouts.app")
@section("content")

    <div class="container">

        <form method="post">
            @csrf

            <div class="form-group">
                <label>Comment Update</label>
                <input type="hidden" name="article_id" value="<?php  echo $id = request()->route('id'); ?>">
                <textarea name="content" class="form-control" >{{$comment->content}}</textarea>
            </div>

            <input type="submit" value="Save changes" class="btn btn-primary mt-4">
        </form>
    </div>
@endsection
