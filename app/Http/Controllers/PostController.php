<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() // it is a function to display a list of posts 
    {
        // the variable that holds the data that i want to retrieve , it is stands as placeholder till we deal with a real database
        $userPosts = [
            [
                'Id' => 1,
                'Title' => 'PHP',
                'Description ' => 'PHP code is executed on the server.',
                'Posted_by' => 'Shehab',
                'Created_at' => '2023-01-31 10:30:00',
            ],
            [
                'Id' => 2,
                'Title' => 'Laravel',
                'Description ' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects',
                'Posted_by' => 'Eng/Ahmed',
                'Created_at' => '2023-02-01 8:30:00',

            ],
            [
                'Id' => 3,
                'Title' => 'Angular',
                'Description ' => 'Angular is a platform for building mobile and desktop web applications. Join the community of millions of developers who build compelling user interfaces .',
                'Posted_by' => 'Eng/Soha',
                'Created_at' => '2023-02-07 9:30:00',

            ],  
        ];

        return view('posts.index',[ // where view () is a global helper method that holds 2 parameters , 1 the page that i want to display the information into , in this case  it is  index page that is located inside the  posts folder

            'userPosts'=>$userPosts // second parameter is the information i want to write into this page , and this part is divided into two parts 'userPosts' is the key that holds the information stored into the second part $userPosts which holds the data that i want to transfer through the key. Note that the KEY and ONLY the KEY that will be seen into the page that i want to transfer data into.                    

        ]);
    }
    public function show($postId) // function to display one post by using postid
{

    $userPost= [
        'Id' => 3,
        'Title' => 'Angular',
        'Description ' => 'Angular is a platform for building mobile and desktop web applications. Join the community of millions of developers who build compelling user interfaces .',
        'Posted_by' => 'Eng/Marina Shafik',
        'Created_at' => '2023-02-07 9:30:00',

    ];
    return view('posts.show',[
        'userPost'=>$userPost // second parameter is the information i want to write into this page , and this part is divided into two parts 'userPosts' is the key that holds the information stored into the second part $userPosts which holds the data that i want to transfer through the key. Note that the KEY and ONLY the KEY that will be seen into the page that i want to transfer data into.                    

    ]);
}

public function create(){
    return view("posts.create");
}
public function store(Request $newpost){
$data=$newpost->all();
$title=$data['title'];
$description=$data['description'];
$post_creator=$data['post_creator'];
dd($post_creator,$title,$description);
}
public  function delete($postId){
    
 
  
    return view('/posts.delete',[
        $postId->destroy('Id') // second parameter is the information i want to write into this page , and this part is divided into two parts 'userPosts' is the key that holds the information stored into the second part $userPosts which holds the data that i want to transfer through the key. Note that the KEY and ONLY the KEY that will be seen into the page that i want to transfer data into.                    
   
    ]);
}
}
