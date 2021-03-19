<?php

namespace App\Http\Controllers;

use App\Models\Mysql;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{

    public function register(Request $request){
        $userName = $request->userName;
        $userEmail = $request->userEmail;
        $userSex = $request->userSex;
        $password = $request->password;
        $password2 = $request->password2;
        if($password == $password2){
            $result = DB::table('user')->where('userEmail',$userEmail)->get();
            if ($result->count('userId') == 0){
                $arr = ['userName'=>$userName,'userEmail'=>$userEmail,'userSex'=>$userSex,'password'=>$password];
                $result = DB::table('user')->insert($arr);
                if($result == false){
                    return redirect()->back()->withErrors(['注册失败']);
                }else{
                    return redirect('/')->withErrors(['注册成功']);
                }
            }else{
                return redirect()->back()->withErrors(['邮箱已被注册']);
            }
        }else{
            return redirect()->back()->withErrors(['两次输入密码不一致，请重试']);
        }
    }

    public function login(Request $request){
        $userEmail = $request->userEmail;
        $password = $request->password;
        $result = DB::table('user')->where('userEmail',$userEmail)->get();
        if($result->count('userId')==0){
            return redirect('/')->withErrors(['邮箱未注册，请先进行注册邮箱']);
        }else{
            if($password == $result[0]->password){
                $request->session()->push('logined',true);
//                var_dump($request->session()->get('user'));die();
                return redirect()->route('list',['userId'=>$result[0]->userId]);
            }else{
                return redirect('/')->withErrors(['密码错误']);
            }
        }
    }

    public function logout(Request $request){
        $request->session()->forget('logined');
        return redirect('/');
    }
}
