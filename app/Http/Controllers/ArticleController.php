<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Category;


use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth')->except(['index','detail']);
    }






    public function index(){
        $category=Category::all();
        $data=Article::latest()->paginate(5);
        return view("articles.index",[
            "articles"=>$data,

        ]);
    }


    public function detail($id){
        $data=Article::find($id);

        return view("articles.detail",[
            "article"=>$data
        ]);
    }

    public function delete($id){
        $data=Article::find($id);
        $data->delete();

        return redirect('/articles')->with('info',"Your post deleted
        ");


    }

    public function create(){
        $data=Category::all();
        return view("articles.add",[
            "categories"=>$data
        ]);
    }

    public function addPost(){
        $validator=validator(request()->all(),[
            "title"=>'required',
            "body"=>'required',

            "category_id"=>"required"

        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title=request()->title;
        $article->body=request()->body;
        $article->user_id = auth()->user()->id;
        $article->category_id=request()->category_id;
        if(request()->hasFile('image')){
            $image = request()->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = $image->store('public/images');
            $article->image = str_replace('public/', '', $path);
        }
        $article->save();

        return redirect("/articles")->with("success","Posted");
    }

    public function edit($id){
        $data = Article::find($id);
        $category = Category::all();


        if(request()->isMethod("post")){

            $article = Article::find($id);

            $article->title = request()->title;
            $article->body = request()->body;
            $article->category_id = request()->category_id;
            $article->save();

            return redirect("/");
        }


        return view("articles.edit",[
            "article"=>$data,
            "categories"=>$category
        ]);
    }

}
