@extends("layouts.app")
@section("content")

    <div class="container">

        <form method="post">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{$article['title']}}">


            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control" value="lkdasjflj">{{$article['body']}}</textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id"  class="form-control">
                    @foreach ($categories as $category )
                    <option value="{{$category['id']}}">
                        {{ $category['name']}}
                     </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Edit" class="btn btn-primary mt-4">
        </form>
    </div>
@endsection
