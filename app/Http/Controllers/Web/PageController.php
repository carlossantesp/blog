<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use Illuminate\Http\Request;

class PageController extends WebController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('web.posts', ['posts' => $this->posts->paginate(3), 'categories'=>$this->categories,'tags'=>$this->tags]);
    }
}
