<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SampleController extends Controller
{
    public function index()
    {
        try{
            $dataList = [
                [
                    'id' => 1,
                    'name' => '山田太郎',
                    'email' => 'yamada.taro@gmail.com',
                ],
            ];
            Log::info('データの取得に成功しました。');
            Log::info($dataList);
            return response()->json($dataList, 200);
        } catch (\Exception $e) {
            Log::error('データの取得に失敗しました。');
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'データの取得に失敗しました。',
                'code' => 'E001',
            ], 500);
        }
    }
}
