<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
     * Display a listing of the resource.
     */
    public function indexForAdmin()
    {
        // すべてのグローバルスコープを削除
        $bookList = Book::withoutGlobalScopes()->get();
        return response()->json($bookList, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        try {
            DB::transaction(function () use (&$request) {
                Log::info($request->all());
                $book = new Book();
                // 一気に全部のカラムをセット
                $book->fill($request->all());

                Log::info(json_encode($book, JSON_UNESCAPED_UNICODE));
                $book->save();
                // throw new \Exception('エラーが出たよ');
            });
            return response()->json(["message"=>"登録しました。"], 200);
        } catch(\Exception $e) {
            Log::error($e);
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
        try {
            DB::transaction(function () use (&$request,&$book) {
                $book->fill($request->all())->save();
                Log::info(json_encode($book, JSON_UNESCAPED_UNICODE));
                throw new \Exception('エラーが出たよ');
            });

            return response()->json(["message"=>"登録内容を修正しました。"], 200);

        } catch(\Exception $e) {

            Log::error($e);
            return response()->json(["message"=>[$e->getMessage()]]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            DB::transaction(function () use (&$book) {
                Log::info(json_encode($book, JSON_UNESCAPED_UNICODE));
                $book->delete();
                throw new \Exception('エラーが出たよ');
            });

            return response()->json(["message"=>"削除しました。"], 200);

        } catch(\Exception $e) {

            Log::error($e);
            return response()->json(["message"=>[$e->getMessage()]]);

        }
    }
}
