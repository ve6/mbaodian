<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    /*
     * 个人资料
     */
    public function setprofile(Request $request){
        $id=$request->session()->get('u_id');
        $province=DB::table('region')->where('parent_id',1)->get();
        //print_r($province);die;
        $work=DB::table('zhiwei')->get();
        //print_r($work);die;
        $user=DB::table('users')
            ->join('zhiwei','users.z_id','=','zhiwei.z_id')
            ->where('users.user_id','=',$id)
            ->first();
        //print_r($user);die;
        return view('user/setprofile',['province'=>$province,'work'=>$work,'user'=>$user]);
    }
    /*
     * 省市县三级联动
     */
    public function sel(Request $request){
        $id=$request->input('id');
        $data=DB::table('region')->where('parent_id',$id)->get();
        foreach($data as $val){
            echo '<option value="'.$val['region_id'].'">'.$val['region_name'].'</option>';
        }
    }
    /*
     * 修改个人资料
     */
    public function change(Request $request){
        $nick=$request->input('nick');
        $job=$request->input('job');
        $sex=$request->input('sex');
        $aboutme=$request->input('aboutme');
        $id=$request->session()->get('u_id');
        $update=DB::table('users')->where('user_id',$id)->update(['user_name'=>$nick,'z_id'=>$job,'user_sex'=>$sex,'user_content'=>$aboutme]);
        if($update){
            $request->session()->set('username',$nick);
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 头像设置
     */
    public function setavator(){
        return view('user/setavator');
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     * 上传头像
     */
    public function postpic(Request $request){
        $datas = $request->file();
        //print_r($datas);die;
        if(empty($datas)){
            return redirect("user/setavator");
        }else{
            $a_addtime=date("Y-m-d H:i:s");
            $file = $request->file('fileField');
            $allowed_extensions = ["png", "jpg", "gif","JPG"];
            //如果上传出错,返回错误信息<getClientOriginalExtension()获取文件名后缀>
            if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            //路径
            $destinationPath = 'picture/';
            //获取图片后缀名
            $extension = $file->getClientOriginalExtension();
            //设置图片名称

            $uid=Session::get("u_id");
            $username=Session::get("username");
            $code=md5($uid.$username);
            $fileName = $code.'.'.$extension;
            //print_r($fileName);die;

            if($file->move($destinationPath, $fileName))
            {
                /*
                 * 设置用户头像字段入库
                 */
                $user_filedir = $destinationPath.$fileName;
                $sql = "update users set user_filedir = '$user_filedir' where user_id = '$uid'";
                $upd = DB::select($sql);
                //var_dump($upd);
                /*
                 * 修改用户头像重新设置session
                 */
                $da  = DB::table('users')->select("user_filedir")->where("user_id",$uid)->first();
                //Session::put('user_filedir',$da['user_filedir']);
                $request->session()->put('user_filedir',$da['user_filedir']);
                //header('location:user/setavator');
                return redirect()->action("UserController@setavator");
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 签到
     */
    public function qiandao(Request $request){
        $u_id=$request->session()->get('u_id');
        $sql=DB::table('qiandao')->where('u_id',$u_id)->first();
        //var_dump($sql);die;
        //判断是否签到
        if(empty($sql)){
            //第一次签到
            $q_time=date('Y-m-d',time());
            //echo $q_time.$q_num;
            DB::table('qiandao')->insert(['q_time'=>$q_time,'q_num'=>1,'u_id'=>$u_id]);
            DB::table('users')->where('user_id',$u_id)->update(['user_score'=>1]);
            //修改session 积分
            $request->session()->put('u_score',1);
            $arr=array(
                "msg"=>1,
                'error'=>0   //无错误
            );
            echo json_encode($arr);
        }else{
            //判断是否连续签到
            $time=date('Y-m-d',strtotime('-1 days'));
            //echo $time;die;
            $t=date('y-m-d',time());
            if($time==$sql['q_time']){
                $score=$sql['q_num']+1;
                DB::table('qiandao')->where('u_id',$u_id)->update(['q_num'=>$score,'q_time'=>$t]);
                DB::update('update users set user_score=user_score+'.$score.' where user_id='.$u_id);

                //修改session
                $jifen = $request->session()->get('u_score');
                $request->session()->put('u_score',$jifen+$score);
                $arr=array(
                    "msg"=>$score,
                    'error'=>0
                );
                echo json_encode($arr);
            }else if($time!=$sql['q_time']){
                DB::table('qiandao')->where('u_id',$u_id)->update(['q_num'=>1,'q_time'=>$t]);
                DB::update('update users set user_score=user_score+1 where user_id='.$u_id);

                //修改session
                $jifen = $request->session()->get('u_score');
                $request->session()->put('u_score',$jifen+1);
                $arr=array(
                    "msg"=>1,
                    'error'=>0
                );
                echo json_encode($arr);
            }
        }
    }

    /**
     * @param Request $request
     * 刷新页面（签到）
     */
    public function zw(Request $request){
        $now=date('Y-m-d',time());
        $u_id=$request->session()->get('u_id');
        //echo $u_id;
        $sql=DB::table('qiandao')->where('u_id',$u_id)->where('q_time',$now)->first();
        //var_dump($sql);
        //判断是否签到
        if(empty($sql)){
            echo 1;
        }else{
            echo 2;
        }
    }

    /*
     * 手机设置
     */
    public function setphone(){
        return view('user/setphone');
    }
    /*
     * 邮箱验证
     */
    public function setverifyemail(){
        return view('user/setverifyemail');
    }
    /*
     * 修改密码
     */
    public function setresetpwd(){
        return view('user/setresetpwd');
    }
    /*
     * 绑定账号
     */
    public function setbindsns(){
        return view('user/setbindsns');
    }

}