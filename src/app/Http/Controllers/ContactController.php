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
        // TODO: jsonデータを受けるようにしたほうがいいかも
        \App\Contact::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]
        );
    }
}
