<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanList = Loan::all();
        return response()->json($loanList, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoanRequest $request)
    {

        try {
            DB::transaction(function () use (&$request) {
                Log::info($request->all());
                $loan = new Loan();
                // 一気に全部のカラムをセット
                $loan->fill($request->all());

                Log::info(json_encode($loan, JSON_UNESCAPED_UNICODE));
                $loan->save();
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
    public function show(Loan $loan)
    {
        return response()->json($loan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoanRequest $request, Loan $loan)
    {
        try {
            DB::transaction(function () use (&$request,&$loan) {
                $loan->fill($request->all())->save();
                Log::info(json_encode($loan, JSON_UNESCAPED_UNICODE));
                // throw new \Exception('エラーが出たよ');
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
    public function destroy(Loan $loan)
    {
        try {
            DB::transaction(function () use (&$loan) {
                Log::info(json_encode($loan, JSON_UNESCAPED_UNICODE));
                $loan->delete();
                // throw new \Exception('エラーが出たよ');
            });

            return response()->json(["message"=>"削除しました。"], 200);

        } catch(\Exception $e) {

            Log::error($e);
            return response()->json(["message"=>[$e->getMessage()]]);

        }
    }
}
