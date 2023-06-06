<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // post listing
    public function index() {
        $posts      =   Post::orderBy("id", "desc")->paginate(5);
        return view("posts/index", compact("posts"));
    }


    // Create Post 
    public function createPost() {
        return view("posts/create");
    }

    // Save New Post
    public function savePost(Request $request) {

        $postArray      =   array( 
            "title"  =>  $request->title,
            "description" => $request->description
        );

        $post  =       Post::create($postArray);

        if(!is_null($post)) {
            return redirect()->route('home')->with("success", "Success! Post created");
        }

        else {
            return back()->with("failed", "Failed! Post not created");
        }
    }

    public function uploadFile(Request $request){

        {
            if ($request->hasFile('upload')) {
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
        
                $request->file('upload')->move(public_path('uploads'), $fileName);
        
                $url = asset('uploads/' . $fileName);
                return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
            }
        }
    
    }

    public function destroy(Request $request, $id)
    {
        Post::destroy($request->all());
        Post::whereId($id)->delete($request->all());
         
       echo ("Record deleted successfully.");
       return redirect()->back();
    }
}