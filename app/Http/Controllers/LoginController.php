<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login/login');
    }
    public function name(Request $request){
        $u_phone=$request->input('u_name');
        $arr=DB::table('users')->where('user_phone',"$u_phone")->first();
        if($arr){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function email(Request $request){
        $u_email=$request->input('u_name');
        $arr=DB::table('users')->where('user_email',"$u_email")->first();
        if($arr){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function name_pwd(Request $request){
        $u_name=$request->input('u_name');
        $u_pwd=$request->input('u_pwd');
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->get();
        if($arr){
            echo 3;
        }else{
            echo 4;
        }
    }
    public function email_pwd(Request $request){
        $u_name=$request->input('u_name');
        $u_pwd=$request->input('u_pwd');
        $arr=DB::table('users')->where('user_email',"$u_name")->where('user_pwd',"$u_pwd")->get();
        if($arr){
            echo 3;
        }else{
            echo 4;
        }
    }
    public function name_deng(Request $request){
        $u_name=$request->input('u_name');
        $u_pwd=$request->input('u_pwd');
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->first();
        //print_r($arr);die;
        if($arr){
            $request->session()->set('u_id',$arr['user_id']);
            $request->session()->set('username',$u_name);
            echo 5;
        }else{
            echo 6;
        }
    }
    public function email_deng(Request $request){
        $u_name=$request->input('u_name');
        $u_pwd=$request->input('u_pwd');
        $arr=DB::table('users')->where('user_email',"$u_name")->where('user_pwd',"$u_pwd")->first();
        //print_r($arr);die;
        if($arr){
            $request->session()->set('u_id',$arr['user_id']);
            $request->session()->set('username',$u_name);
            echo 5;
        }else{
            echo 6;
        }
    }
    //注册
    public function register(){
        return view('login/register');
    }
    public function reg(Request $request){
        $name=$request->input('username');
        $pwd=$request->input('password');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $a_name=DB::table('users')->where('user_name',"$name")->first();
        if($a_name){
            echo "<script>alert('用户名已存在');location.href='index'</script>";
        }else{

            if(DB::table('users')->where('user_email',"$email")->first()){

                echo "<script>alert('邮箱已存在');location.href='index'</script>";
            }else{
                if(DB::table('users')->where('user_phone',"$phone")->first()){
                    echo "<script>alert('手机号已存在');location.href='index'</script>";
                }else{
                    $arr=DB::insert("insert into users(user_name,user_pwd,user_email,user_phone) values('$name','$pwd','$email','$phone');");
                    if($arr){
                        $request->session()->set('username',$name);
                        echo "<script>alert('注册成功');location.href='index'</script>";
                    }else{
                        echo "<script>alert('注册失败');location.href='index'</script>";
                    }
                }
            }
        }
    }

    public function out(Request $request){
        $request->session()->forget('username');
        $request->session()->forget('u_id');
        echo "<script>alert('退出成功');location.href='index'</script>";
    }




 }
