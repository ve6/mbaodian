<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    /*
     * 试题展示
     */
    public function course(Request $request)
    {
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
//        $shi->setPath();
        return view('course/course',['arr'=>$xue,'zhuan'=>$zhuan,'shi'=>$shi,'lei'=>$lei,'vv'=>$v,'a'=>$a,'l'=>$l]);
    }
    /*
     * 试题详情
     */
    public function xiang(Request $request)
    {
        $id=$request->get('id');
        $v=$request->get('v',0);
        $a=$request->get('a',0);
        $l=$request->get('l',0);
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
            $arr_max=DB::table('college_questions')->select('c_id')->where('c_id','>',$id)->where($arr)->first();
            $arr_min=DB::table('college_questions')->select('c_id')->where('c_id','<',$id)->where($arr)->orderby('c_id','desc')->first();
        }else{
            $arr_max=DB::table('college_questions')->select('c_id')->where('c_id','>',$id)->first();
            $arr_min=DB::table('college_questions')->select('c_id')->where('c_id','<',$id)->orderby('c_id','desc')->first();
        }
        $sq=DB::update("update college_questions set c_num=c_num+1 where c_id=".$id);
        $arr=DB::table('college_questions')->where('c_id',$id)->first();
        $username=$request->session()->get('username');
        $ping=DB::table('e_ping')
            ->join('users','e_ping.u_id','=','users.user_id')
            ->where('e_id',$id)->orderby('p_id','desc')->take(5)->get();
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
        return view('course/xiang',['arr'=>$arr,'ping'=>$ping,'max'=>$arr_max['c_id'],'min'=>$arr_min['c_id']]);
    }
    /*
     *
     */
	 public function con(Request $request)
    {
        $con = $request->input('con');
        $c_id = $request->input('c_id');
        $e_addtime=date("Y-m-d H:i:s");
        $username=$request->session()->get('username');
        if(empty($username)){
            echo "1";
        }else{
            $user=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
            $u_id=$user['user_id'];
            $sql="insert into e_ping(p_con,u_id,e_id,e_addtime) values('$con',$u_id,'$c_id','$e_addtime')";
            DB::insert($sql);
            $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where u_id=$u_id and e_id=$c_id order by p_id desc limit 5");
            return view('course/ping',['ping'=>$ping]);
        }
    }

}
