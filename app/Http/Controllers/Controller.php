<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Log;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private function queryJSON(Request $req, $table)
    {
        $query = DB::table($table);
        $input = $req->all();
        foreach ($input as $key => $value) {
            $query = $query->where($key, $value);
        }
        $data = $query->get();
        $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return response($json)
            ->header('Content-Type', 'application/json;charset=utf-8');
    }

    protected function invokeAPI($method, $api, $input)
    {
        $input['timestamp'] = date('Y-m-d H:i:s');
        $input['nonce'] = bin2hex(random_bytes(6));
        $fields = $input;
        ksort($fields);
        $str = implode($fields);
        $sign = hash_hmac('sha256', $str, '111111');
        $input['sign'] = $sign;
        $ch = curl_init();
        $url = "http://192.168.1.109:8080/v1/" . $api;
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
        } else if ($method == 'PUT') {
            curl_setopt($ch, CURLOPT_PUT, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
        } else {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $args = '';
            foreach ($input as $key => $value) {
                if ($args != '') {
                    $args .= '&';
                }
                $args .= $key . '=' . urlencode($value);
            }
            if ($args != '') {
                $url .= '?' . $args;
            }
        }
        Log::info($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        $res = curl_exec($ch);
        if (curl_errno($ch)) {
            Log::Warn(curl_error($ch));
        } else {
            Log::info($res);
            curl_close($ch);
        }
        return $res;
    }
}
