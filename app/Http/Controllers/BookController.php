<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookList = Book::all();
        return response()->json($bookList, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        try {
            Log::info($request->all());
            $book = new Book();
            // 一気に全部のカラムをセット
            $book->fill($request->all());

            Log::info(json_encode($book, JSON_UNESCAPED_UNICODE));

           if($book->save()){
                return response()->json(["message"=>"登録しました。"], 200);
           }

        } catch(\Exception $e) {
            Log::error(json_encode($book, JSON_UNESCAPED_UNICODE));
            return response()->json(["message"=>[$e->getMessage()]]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Book $book)
    {
        $book->fill($request->all())->save();
        Log::info(json_encode($book, JSON_UNESCAPED_UNICODE));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {

            Log::info(json_encode($book, JSON_UNESCAPED_UNICODE));

            if($book->delete()){
                return response()->json(["message"=>"削除しました。"], 200);
            }

        } catch(\Exception $e) {
            Log::error(json_encode($book, JSON_UNESCAPED_UNICODE));
            return response()->json(["message"=>[$e->getMessage()]]);
        }

    }
}
