@extends("layouts.app")
@section("content")

   <div class="container">
    @if($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach($errors->all() as $err)
            <li>{{$err}}</li>
            @endforeach
        </ol>
    </div>
    @endif
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label >Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label >Title</label>
            <textarea name="body" class="form-control"></textarea>
        </div>


        <div class="mb-3">
            <label > Category</label>
            <select name="category_id" id="" class="form-control">
                @foreach($categories as $category)
                <option value="{{$category['id']}}">
                    {{$category['name']}}
                </option>
                @endforeach
            </select>
        </div>
        <div>

        </div>
        <div>
           <label>Photo</label>
            <div class="form-group mb-5">
                <input type="file" class="form-control alert-warning" name="image" placeholder="Choose image" id="image">

            </div>
        </div>





        <button type="text" class="btn btn-primary" >Add Post</button>
    </form>

   </div>



@endsection
