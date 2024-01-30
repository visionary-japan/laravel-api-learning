<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Exceptions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewList = Review::all();
        return response()->json($reviewList, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {

        try {
            DB::transaction(function () use (&$request) {
                Log::info($request->all());
                $review = new Review();
                // 一気に全部のカラムをセット
                $review->fill($request->all());

                Log::info(json_encode($review, JSON_UNESCAPED_UNICODE));
               $review->save();
            //    throw new \Exception('エラーが出たよ');
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
    public function show(Review $reviews)
    {
        return response()->json($reviews, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, Review $reviews)
    {
        try {
            DB::transaction(function () use (&$request,&$reviews) {
                $reviews->fill($request->all())->save();
                Log::info(json_encode($reviews, JSON_UNESCAPED_UNICODE));
                // throw new \Exception('エラーが出たよ');
            });

            return response()->json(["message"=>"登録内容を修正しました。"], 200);

        }  catch(\Exception $e) {

            Log::error($e);
            return response()->json(["message"=>[$e->getMessage()]]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $reviews)
    {
        try {
            DB::transaction(function () use (&$reviews) {

                Log::info(json_encode($reviews, JSON_UNESCAPED_UNICODE));
                $reviews->delete();
                // throw new \Exception('エラーが出たよ');
            });

            return response()->json(["message"=>"削除しました。"], 200);

        } catch(\Exception $e) {

            Log::error($e);
            return response()->json(["message"=>[$e->getMessage()]]);

        }
    }
}
