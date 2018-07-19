<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    use App\User; // add

    class UsersController extends Controller
{
public function index()
    {
        $users = User::all();
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
 public function show($id)
    {
        $user = User::find($id); //$use関数に自分のIdを探して代入する
        
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10); //$micropostsに$use情報とmicropostsを順番に並べる

        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    

public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function liking($id)
    {
     
    $user = User::find($id);
        $followers = $user->feed_microposts()->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.favorite', $data);
        
        
    }
    
}
//indexとshowのお話
//$dataに上のUserとMicropostsを代入
//さらにDataにCountを加入
//最後、Users.Showにこれまで代入したdataを受け渡す。コントローラーだから最後はビューに返して表示させる。