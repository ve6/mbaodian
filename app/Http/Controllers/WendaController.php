<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Question;
use Illuminate\Pagination\LengthAwarePaginator;

/* 答疑开发
 * @wei
 * 2016 8 15
 */
 header("content-type:text/html;charset=utf-8");
class WendaController extends Controller
{
	/*答疑首页*/
    public function wenda()
	{
        $user = new Question();
		$pro  = $user->question_sql();
        //print_r($pro);die;
        return view('wenda/wenda',['pro'=>$pro]);
    }

	/*答疑提问页面*/
    public function save(Request $request){
		$name = $request->session()->get('name');
       
        if(empty($name)){
            echo "<script>alert('请先登录'),location.href='index'</script>";exit;
        }else{
            $pro=DB::table('direction')->get();
        
			//显示各个学院
			return view('wenda/save',['pro'=>$pro]);
        }
        
    }
	/*提交提问功能*/
    public function tiwen(Request $request){
		//接收post值
        $t_title   = $request->input("t_title");
        $t_content = $request->input("aa");
        $pro       = $request->input("pro");
		$add_time  = date('Y-m-d H:i:s');
		
        //获取用户id
        $u_id = $request->session()->get('u_id');
		//执行添加方法
        $res = DB::insert('insert into t_tw (t_title, t_content, user_id, d_id, add_time) values (?, ?, ?, ?, ?)', [$t_title, $t_content, $u_id, $pro, $add_time]);
		if($res)
		{
			echo 1;
		}else
		{
			echo 0;
		} 
    }
	/*
	 *@针对问题 添加回答
	 *@wei
	 *@2016.8.16
	 */
    public function detail(Request $request){
		//获取到问题id值
        $id=$request->input("id");
		
		//问题 提问人显示
		$user = new Question();
		$arr  = $user->tw_sql($id);
        
       //查询提问人
       $arr_user=DB::table('t_tw')->leftjoin('users','users.user_id','=','t_tw.user_id')->where("t_tw.t_id",$id)->first();
       // 评论答案
       //$arr_com=DB::table("comments")->leftjoin('users','users.user_id','=','comments.user_id')->leftjoin('t_tw','t_tw.t_id','=','t_tw.t_id')->where("comments.t_id",$id)->get(); 

	   $arr_com = $user->comments($id);
	   $count =  DB::table('comments')
			 //->join('t_tw', 'comments.t_id', '=', 't_tw.t_id')         
			 ->join('comments_zan', 'comments.com_id', '=', 'comments_zan.com_id')         
			 ->where('comments.t_id', '=' ,$id)
			 ->count();
	   // echo $count;
	   // die;

        return view('wenda/detail',['arr'=>$arr],['arr_com'=>$arr_com,'arr_user'=>$arr_user,'count'=>$count]);
 

    }
	
	/*
	 * @答疑：问题答案处理
	 * @wei
	 * @8.16
	 */
    public function hui(Request $request)
	{
		//用户登录id
		$user_id = $request->session()->get('u_id');
		if(empty($user_id))
		{
			echo 0;
		}
		
		$con=$_POST['aa'];
		$tid=$_POST['tid'];
		$time=date("Y-m-d H:i:s");
		//答案信息入库
		$sq="insert into comments(com_content,com_addtime,user_id,t_id) values('$con','$time','$user_id','$tid')";
		$re=DB::insert($sq);
		if($re){
			echo 1;
		}
		
		// $arr_com=DB::select("select * from comments inner join users on users.user_id=comments.user_id inner join t_tw on t_tw.t_id=comments.t_id where comments.t_id=$tid order by com_id desc");
		// return view('wenda/aa',['arr_com'=>$arr_com]);
    }
	
	/*
	 * @答疑：答案点赞
	 * @wei
	 * @8.17
	 */
	public function answer_zan(Request $request)
	{
		//接收到答案的id值
		$com_id = $request->input("com_id");
		//用户登录id
		$user_id = $request->session()->get('u_id');
		$users = DB::table('comments_zan')
                    ->where('com_id', '=', $com_id)
                    ->where('user_id', '=', $user_id)
                    ->first();
		//print_r($users) ;
		if(!empty($users)){
			echo 1;
		}else{
			
			$res = DB::insert('insert into comments_zan (com_id, user_id) values (?, ?)', [$com_id, $user_id]);
			if($res){
				echo 'ok';
			}
			
		}	
		
	}

/*     public function zid(){
            session_start();
            $zid=$_GET['name'];
            $id=$_SESSION['user_id'];
            $user = DB::table('dianzan')->where('user_id', $id)->first();
            //print_r($user); 
           if($user['z_id']!=$zid){
                $sq="insert into dianzan(z_id,user_id) values('$zid','$id')";
                $rr=DB::insert($sq);
                if($rr){
                    //$id=$_SESSION['user_id'];
                    //$sql="select z_id from z_u where user_id='$id'";
                    //$re=DB::select($sql);
                    //if(empty($re)){
                       // $sq="insert into z_u(z_id,user_id) vlues('$zid','$id')";
                       // $rr=DB::select($sq);
                        if($rr){
                            echo '1';
                        }
                }
            }
                else{
                    $sqp="delete from z_u where z_id='$zid' and user_id='$id'";
                    $rq=DB::delete($sqp);
                    if($rq){
                        echo '3';
                    }        
                }
               
        } */

    
}