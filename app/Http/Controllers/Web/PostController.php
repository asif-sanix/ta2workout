<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\PostResource;
use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Posts(Request $request){

        //return $request->all();
        $posts = Post::select('id','title','slug','subtitle','body','image')->paginate(1);
        if ($posts->count()) {
            return response()->json([
                'posts'=>PostResource::collection($posts),
                'paginate'=>[
                    'total' => $posts->total(),
                    'count' => $posts->count(),
                    'per_page' => $posts->perPage(),
                    'current_page' => $posts->currentPage(),
                    'total_pages' => $posts->lastPage()
                ]
            ]);
        } 
        return response()->json(array('message'=>'Record Not Found','posts'=>[],'page_image'=>'','paginate'=>[]));
    }

    public function singlePost(Request $request, post $post){
           return response()->json(['post'=>$post]);
   }
}
