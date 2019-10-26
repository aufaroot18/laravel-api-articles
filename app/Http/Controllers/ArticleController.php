<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrieve all articles
        $articles = Article::all();

        // save response
        $res["message"] = "Success";
        $res["data"] = $articles;

        // return response to json
        return response()->json($res, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation input
        $validateArticle = $request->validate([
            "title" => "required",
            "body" => "required"
        ]);

        // if validataion pass, insert article
        $article = Article::create([
            "title" => $request->title,
            "body" => $request->body
        ]);

        // save response
        $res["message"] = "Success";
        $res["data"] = $article;

        // return response to json
        return response()->json($res, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retrieve specified data
        $article = Article::find($id);

        // if article found
        if($article) {
            // save response
            $res["message"] = "Success";
            $res["data"] = $article;

            // return response to json
            return response()->json($res, 200);
        }

        // if article not found
        else {
            // save response;
            $res["message"] = "Not found";

            // return response to json
            return response()->json($res, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // retrieve specified data
        $article = Article::find($id);

        // if article found
        if($article) {
            // update article
            $article = Article::where('id', $id)->update([
                "title" => $request->title,
                "body" => $request->body
            ]);

            // save json
            $res["message"] = "Success";

            // return response json
            return response()->json($res, 200);
        }

        // if article not found
        else {
            // save json
            $res["message"] = "Not Found";

            // return response json
            return response()->json($res, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // retrieve spesified data
        $article = Article::find($id);

        // if article found
        if ($article) {
            // delete article
            $article->delete();

            // save response
            $res["message"] = "Success";

            // return response to json
            return response()->json($res, 200);
        }

        // if article not found
        else {
            // save response
            $res["message"] = "Not Found";

            // return response to json
            return response()->json($res, 404);
        }
    }
}
