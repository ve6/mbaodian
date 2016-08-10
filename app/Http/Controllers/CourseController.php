<?php
namespace App\Http\Controllers;

use DB;
class CourseController extends Controller
{
    public function course(){
        $v=isset($_GET['v'])?$_GET['v']:0;
        $a=isset($_GET['a'])?$_GET['a']:0;
        $l=isset($_GET['l'])?$_GET['l']:0;
        $arr=array();
        if($v){
            $college=DB::table('college')->where('c_id',$v)->first();
            $arr['c_college']=$college['c_name'];
            //专业
            $zhuan=DB::table('direction')->where('college_id',$v)->get();
        }else{
            //专业
            $zhuan=DB::table('direction')->get();
        }
        if($a){
            $direction=DB::table('direction')->where('d_id',$a)->first();
            $arr['c_direction']=$direction['d_name'];
        }
        if($l){
            $type=DB::table('type')->where('t_id',$l)->first();
            $arr['c_type']=$type['t_name'];
        }
        //学院
        $xue=DB::table('college')->where('c_del',0)->get();
        //类型
        $lei=DB::table('type')->get();
//        print_r($arr);die;
        if($arr){
//            $college = DB::table('college')->where($arr)->first();
            $shi=DB::table('college_questions')->where($arr)->simplePaginate(12);
        }else{
            //全部试题
            $shi=DB::table('college_questions')->simplePaginate(12);
        }
        return view('course/course',['arr'=>$xue,'zhuan'=>$zhuan,'shi'=>$shi,'lei'=>$lei]);
    }
    public function xiang(){
        $id=$_GET['id'];
        $v=isset($_GET['v'])?$_GET['v']:0;
        $a=isset($_GET['a'])?$_GET['a']:0;
        $l=isset($_GET['l'])?$_GET['l']:0;
        $arr=array();
        if($v){
            $college=DB::table('college')->where('c_id',$v)->first();
            $arr['c_college']=$college['c_name'];
        }
        if($a){
            $direction=DB::table('direction')->where('d_id',$a)->first();
            $arr['c_direction']=$direction['d_name'];
        }
        if($l){
            $type=DB::table('type')->where('t_id',$l)->first();
            $arr['c_type']=$type['t_name'];
        }
        if($arr){
            $arr_max=DB::table('college_questions')->where('c_id','>',$id)->where($arr)->first();
            $arr_min=DB::table('college_questions')->where('c_id','<',$id)->where($arr)->orderby('c_id','desc')->first();
        }
        $sq=DB::update("update college_questions set c_num=c_num+1 where c_id=".$id);
        $arr=DB::table('college_questions')->where('c_id',$id)->first();
        if(!isset($_SESSION)){
            session_start();
        }
        if(!empty($_SESSION['username'])){
            $username=$_SESSION['username'];
            $u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
            $u_id=$u_id['user_id'];
            $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where u_id=$u_id order by p_id desc");
        }else{
            $ping=array();
        }
        if($arr['c_college']=='软工学院'){
            $arr['img']='http://123.56.249.121/api/logo/软工.jpg';
        }elseif($arr['c_college']=='移动通信学院'){
            $arr['img']='http://123.56.249.121/api/logo/移动.jpg';
        }elseif($arr['c_college']=='云计算学院'){
            $arr['img']='http://123.56.249.121/api/logo/云计算.jpg';
        }elseif($arr['c_college']=='高翻学院'){
            $arr['img']='http://123.56.249.121/api/logo/高翻.jpg';
        }elseif($arr['c_college']=='国际经贸学院'){
            $arr['img']='http://123.56.249.121/api/logo/经贸.jpg';
        }elseif($arr['c_college']=='建筑学院'){
            $arr['img']='http://123.56.249.121/api/logo/建筑.jpg';
        }elseif($arr['c_college']=='游戏学院'){
            $arr['img']='http://123.56.249.121/api/logo/游戏.jpg';
        }elseif($arr['c_college']=='网工学院'){
            $arr['img']='http://123.56.249.121/api/logo/网工.jpg';
        }elseif($arr['c_college']=='传媒学院'){
            $arr['img']='http://123.56.249.121/api/logo/传媒.jpg';
        }
      //  echo $arr['img'];die;
        return view('course/xiang',['arr'=>$arr,'ping'=>$ping,'max'=>$arr_max['c_id'],'min'=>$arr_min['c_id']]);
    }
	 public function con()
    {
        $con = $_POST['con'];
        $c_id = $_POST['c_id'];
        $e_addtime=date("Y-m-d H:i:s");
        if(!empty($_SESSION['username'])){
            echo "1";
        }else{
            if(!isset($_SESSION)){
                  session_start();
            }
            $username=$_SESSION['username'];
            $u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
            $u_id=$u_id['user_id'];
            $sql="insert into e_ping(p_con,u_id,e_id,e_addtime) values('$con',$u_id,'$c_id','$e_addtime')";
            $re=DB::insert($sql);
            $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where u_id=$u_id order by p_id desc");
            return view('course/ping',['ping'=>$ping]);
        }
    }

}
