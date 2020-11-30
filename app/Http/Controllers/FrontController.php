<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        /*$category = category::SearchCategory($name)->first();
        $articles = $category->articles()->paginate(6);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
            $articles->user;
        });
        $categories = category::orderBy('name','desc')->get();
        $tags = tag::orderBy('name','desc')->get();*/
        //dd('recuperar la info necesaria para msotrar');
        return view('admin.admin');
        /*->with('articles', $articles)
        ->with('categories', $categories)
        ->with('tags', $tags);*/
    }
}
