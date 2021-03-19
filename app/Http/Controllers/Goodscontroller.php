<?php

namespace App\Http\Controllers;

use App\Models\Mysql;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Goodscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('loginstatus');
    }
    //
    public function list(Request $request){
        $userId = $request->userId;
        $user = DB::table('user')->where('userId',$userId)->get('userName');
        $result = DB::table('goods')->where('userId',$userId)->get();
        return view('goodsList',['rows'=>$result,'title'=>'Welcome '.$user[0]->userName.' to Mystore','userId'=>$userId]);
    }

    public function add($id,Request $request){
        $goodsName = $request->goodsName;
        $price = $request->price;
        $goodsNum = $request->goodsNum;
        $goodsIntro = $request->goodsIntro;

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public',$filename);
        $userId = $id;
        $arr = ['goodsName'=>$goodsName,'price'=>$price,'goodsNum'=>$goodsNum,'goodsIntro'=>$goodsIntro,'image'=>$filename,'userId'=>$userId];
        $result = DB::table('goods')->insert($arr);
        if($result == false){
            return redirect()->back()->withErrors(['添加失败']);
        }else{
            return redirect()->route('list',['userId'=>$userId]);
        }
    }

    public function delate($goodsId){
        $result = DB::table('goods')->where('goodsId',$goodsId)->delete();
        if($result){
            return redirect()->back();
        }
    }

    public function altershow($goodsId){
        $result = DB::table('goods')->where('goodsId',$goodsId)->get();
        return view('goodsalter',['arr'=>$result[0]]);
    }

    public function alter(Request $request,$userId){
        $goodsId = $request->goodsId;
        $goodsName = $request->goodsName;
        $price = $request->price;
        $goodsNum = $request->goodsNum;
        $goodsIntro = $request->goodsIntro;
        $file = $request->file('image');
        if($file){
            $filename = $file->getClientOriginalName();
            $file->storeAs('public',$filename);
            $arr = ['goodsName'=>$goodsName,'price'=>$price,'goodsNum'=>$goodsNum,'goodsIntro'=>$goodsIntro,'image'=>$filename];
        }else{
            $arr = ['goodsName'=>$goodsName,'price'=>$price,'goodsNum'=>$goodsNum,'goodsIntro'=>$goodsIntro];
        }
        $result = DB::table('goods')->where('goodsId',$goodsId)->update($arr);
        if($result){
            return redirect()->route('list',['userId'=>$userId]);
        }else{
            return redirect()->back();
        }
    }

    public function search(Request $request){
        $goodsName = $request->goodsName;
        $userId = $request->userId;
        if($goodsName != null){
            $result = DB::table('goods')->where('goodsName',$goodsName)->where('userId',$userId)->get();
            return view('goodsList',['rows'=>$result,'title'=>'Search for '.$goodsName,'userId'=>$userId]);
        }else{
            return redirect()->route('list',['userId'=>$userId]);
        }

    }

    public function back(){
        return redirect()->back();
    }
}
