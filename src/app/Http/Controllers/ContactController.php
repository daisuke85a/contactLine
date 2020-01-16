<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: バリデーションする
        \App\Contact::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]
        );

        $message = "【お名前】\n{$request->input('name')}\n\n【アドレス】\n{$request->input('email')}\n\n【問い合わせ内容】\n{$request->input('content')}";

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(config('services.line.channel_access_token'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => config('services.line.channel_secret')]);

        $response = $bot->broadcast($textMessageBuilder);

        if (isset($response) && $response->isSucceeded()) {
            \Log::info('Line Send Succeeded!');
        } else {
            \Log::info('Line Send Failed!');
            // Failed
            echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
        }
    }
}
