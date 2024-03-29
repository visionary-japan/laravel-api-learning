<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = User::all();
        return response()->json($userList, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        try {
            DB::transaction(function () use (&$request) {
                Log::info($request->all());
                $user = new User();
                // 一気に全部のカラムをセット
                $user->fill($request->all());

                Log::info(json_encode($user, JSON_UNESCAPED_UNICODE));
                $user->save();
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
    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {

        try {
            DB::transaction(function () use (&$request,&$user) {

                $user->fill($request->all())->save();
                Log::info(json_encode($user, JSON_UNESCAPED_UNICODE));
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
    public function destroy(User $user)
    {
        try {
            DB::transaction(function () use (&$user) {
                Log::info(json_encode($user, JSON_UNESCAPED_UNICODE));
                $user->delete();
                // throw new \Exception('エラーが出たよ');
            });

            return response()->json(["message"=>"削除しました。"], 200);

        } catch(\Exception $e) {

            Log::error($e);
            return response()->json(["message"=>[$e->getMessage()]]);

        }
    }
}
