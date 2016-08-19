<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use open51094;
use Illuminate\Support\Facades\Session;

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

    //验证登陆
    public function region(Request $request){
		$name=$request->input('name');
		$pwd=$request->input('pwd');
        
        //echo $name;
        $user = DB::table('users')->where(['user_phone'=>"$name",'user_pwd'=>"$pwd"])
			->orwhere(['user_email'=>"$name",'user_pwd'=>"$pwd"])->first();
        if($user){
            $request->session()->set('u_score',$user['user_score']);
            $request->session()->set('u_id',$user['user_id']);
            $request->session()->set('username',$user['user_name']);
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
     * qq第三方登录
     */
    public function qqLogin(Request $request){
        include 'open51094.class.php';
        $open = new open51094();
        $code=$request->input('code');
        //var_dump( $open->me($code) );die;
        $data=$open->me($code);
       // var_dump($data);die;
        $qqname=$data['name'];
        //echo qqname;die;
        $only=$data['uniq'];
        $sel= DB::table('users')->where('user_openid',$only)->first();
       // var_dump();die;
        if($sel){
            $qq_name = $sel['user_nickname'];
            $user_id = $sel['user_id'];
            $request->session()->set('username',$qq_name);
            $request->session()->set('user_id',$user_id);
        }else{
            DB::table('users')->insert(['user_nickname'=> $qqname,'user_openid'=>$only]);
            $request->session()->set('username',$qqname);
        }
        return redirect()->action('IndexController@index');
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
                    $id=DB::table('users')->insertGetId(['user_name'=>$name,'user_pwd'=>$pwd,'user_email'=>$email,'user_phone'=>$phone]);
                    if($id){
                        $request->session()->set('username',$name);
                        $request->session()->set('u_id',$id);
                        echo "<script>alert('注册成功');location.href='index'</script>";
                    }else{
                        echo "<script>alert('注册失败');</script>";
                    }
                }
            }
        }
    }

    public function out(Request $request){
        $request->session()->forget('username');
        $request->session()->forget('u_id');
        $request->session()->forget('u_score');
        echo "<script>alert('退出成功');location.href='index'</script>";
    }

 }
