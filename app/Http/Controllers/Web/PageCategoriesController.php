<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;

class PageCategoriesController extends WebController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Category $category)
    {
        $postsForCategory = $this->posts->where('category_id', $category->id)->paginate(3);
        return view('web.posts', ['posts' => $postsForCategory ,'categories'=>$this->categories,'tags'=>$this->tags]);
    }
}
