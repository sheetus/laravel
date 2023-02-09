<?php

namespace App\Http\Controllers;
 use App\Http\Controllers\CommentController;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User as AuthUser;

class PostController extends Controller
{
    public function index() // it is a function to display a list of posts 
    {
        // the variable that holds the data that i want to retrieve , it is stands as placeholder till we deal with a real database
        $userPosts =Post::all();
    
        return view('posts.index',[ // where view () is a global helper method that holds 2 parameters , 1 the page that i want to display the information into , in this case  it is  index page that is located inside the  posts folder

            'userPosts'=>$userPosts // second parameter is the information i want to write into this page , and this part is divided into two parts 'userPosts' is the key that holds the information stored into the second part $userPosts which holds the data that i want to transfer through the key. Note that the KEY and ONLY the KEY that will be seen into the page that i want to transfer data into.                    

        ]);
    
    }
    public function show($postId) // function to display one post by using postid
{
$users=User::get();
    $userPost= Post::find($postId);
  
    return view('posts.show',[
   'users'=>$users,
        'userPost'=>$userPost // second parameter is the information i want to write into this page , and this part is divided into two parts 'userPosts' is the key that holds the information stored into the second part $userPosts which holds the data that i want to transfer through the key. Note that the KEY and ONLY the KEY that will be seen into the page that i want to transfer data into.                    

    ]);
}

public function create(){
    return view("posts.create",[
        'users'=>User::all()
    ]);
}
// public function store(Request $request){
// $data=$request->all();
// $title=$data['title'];
// $description=$data['description'];
//
// Post::create([
//     'title'=>$title,
//     'description'=>$description,
//   

// ]);

// }
public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3',
            'description'=>'required|min:10'
        ]);
        $data=$request->all();

        // $created_At= new Carbon;
        // $created_At=$created_At->toDateString();
     

$title=$data['title'];
$description=$data['description'];
$user=$data['user_id'];
// $created_At=$data['created_at'];
        $newPost = Post::create([
            'title' =>$title,
            'description' =>$description,
            'user_id' => $user,
            // 'created_at'=>$created_At
            // 'created_at'=> $created_At
        ]);

        return redirect('/posts');
    }
public  function delete($postId){
    $userPost=Post::find($postId);
    if ($userPost != null) {
        $userPost->delete();
        return redirect()->route('posts.index')->with(['message'=> 'Successfully deleted!!']);
    }

    return redirect()->route('posts.index')->with(['message'=> 'Wrong ID!!']);
} 
    
public function edit($postId) // function to display one post by using postid
{

    $userPost= Post::find($postId);
    return view('posts.edit',[
        'userPost'=>$userPost // second parameter is the information i want to write into this page , and this part is divided into two parts 'userPosts' is the key that holds the information stored into the second part $userPosts which holds the data that i want to transfer through the key. Note that the KEY and ONLY the KEY that will be seen into the page that i want to transfer data into.                    

    ]);
}
public function update(Request $request ,$postId){
    // Validate the data
    $this->validate($request,[
        'title'=>'required|min:3',
        'description'=>'required|min:10'
    ]);
    // save data to the database
    $userPost=Post::find($postId);
    $userPost->title=$request->input('title');
    $userPost->description=$request->input('description');
    $userPost->save();
    // set flash data with success message
  
}
};

