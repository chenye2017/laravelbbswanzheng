<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;


class VerificationCodesController extends Controller
{
    //
    public function store()
    {
        //return $this->response->array(['test_message' => 'store verification code']);

        $param = [
            'apikey' => 'd9e3e7ce3b81bb8920561af9f7d2b094',
            'mobile' => '18616748127',
            'text' => 'test',
        ];

        $header = [
            'Accept:application/json;charset=utf-8',
            'Content-Type:application/x-www-form-urlencoded;charset=utf-8',
        ];

        return $this->post("https://sms.yunpian.com/v2/sms/single_send.json", $param, $header);

    }

    public function post($url, $data = [], $header = [])
    {
//初始化curl
        $curl = curl_init();
        //设置cURL传输选项

        if(is_array($header)){
            curl_setopt($curl, CURLOPT_HTTPHEADER  , $header);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!empty($data)){//post方式
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        //获取采集结果
        $output = curl_exec($curl);

        //关闭cURL链接
        curl_close($curl);

        //解析json
        $json=json_decode($output,true);
        var_dump($json);exit;
        //判断json还是xml
        return $json;
    }
}
