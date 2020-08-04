<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use App\Post;
use Illuminate\Http\Request;

class PagePostController extends WebController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $slug)
    {
        return view('web.post', ['post' => Post::with(['category','tags'])->findSlug($slug), 'categories'=>$this->categories,'tags'=>$this->tags ]);
    }
}
