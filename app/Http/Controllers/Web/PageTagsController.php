<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use App\Tag;
use Illuminate\Http\Request;

class PageTagsController extends WebController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Tag $tag)
    {
        $postsForTag = $this->posts
                    ->whereHas('tags', function($query) use ($tag) {
                        $query->where('slug', $tag->slug);
                    })->paginate(3);

        return view('web.posts', ['posts'=>$postsForTag, 'categories'=>$this->categories,'tags'=>$this->tags]);
    }
}
