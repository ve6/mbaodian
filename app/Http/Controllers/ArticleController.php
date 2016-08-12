<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class ArticleController extends Controller
{
    /*
     * 方法主页
     */
    public function article(Request $request){
        $at_id=$request->get('at');
        $at_type=DB::table('ar_type')->get();
        if($at_id){
            $article=DB::table('article')
                ->leftjoin('ar_type','article.a_type','=','ar_type.at_id')
                ->leftjoin('article_zan','article.a_id','=','article_zan.article_id')
                ->groupBy('article.a_id')
                ->orderby('article.a_id','desc')
                ->select('article.*','ar_type.*',DB::raw('COUNT(article_zan.az_id) as at_zan'))
                ->where('article.a_type',$at_id)
                ->simplePaginate(10);
        }else{
            $article=DB::table('article')
                ->leftjoin('ar_type','article.a_type','=','ar_type.at_id')
                ->leftjoin('article_zan','article.a_id','=','article_zan.article_id')
                ->groupBy('article.a_id')
                ->orderby('article.a_id','desc')
                ->select('article.*','ar_type.*',DB::raw('COUNT(article_zan.az_id) as at_zan'))
                ->simplePaginate(10);
        }
        return view('article/article',['at_type'=>$at_type,'article'=>$article,'at'=>$at_id]);
    }

    /*
     * 文章添加界面
     */
    public function publish(){
        $at_type=DB::table('ar_type')->get();
        $a_lei=DB::table('a_lei')->get();
        return view('article/publish',['ar_type'=>$at_type,'a_lei'=>$a_lei]);
    }

    /*
     * 添加文章
     */
    public function add(Request $request){
        $a_title=$request->input('a_title');
        $a_type=$request->input('a_type');
        $a_con=$request->input('a_con');
        $a_addtime=date("Y-m-d H:i:s");
        $re=DB::insert("insert into article(a_title,a_type,a_con,a_addtime) values('$a_title',$a_type,'$a_con','$a_addtime')");
        if($re){
            echo "<script>alert('提交成功');location.href='article';</script>";
        }else{
            echo "<script>alert('提交失败');history.go(-1);</script>";
        }
    }
    
    /*
     * 点赞
     */
    public function zan(Request $request){
        $a_id=$request->input('zan');
//        $request->session()->set('username','zjw');
        echo $request->session()->get('username');
    }
    
    
    public function type(Request $request){
        $type=$request->get('type');
        if($type=='0'){
            $type=DB::table('article')->get();
        }else{
            $type=DB::table('article')->where("a_type",$type)->get();
        }

        //print_r($type);die;
        return view("article/type",['article'=>$type]);
    }

    /*
     * 方法详情
     */
    public function wxiang(Request $request){
        $username=$request->session()->get('username');
        $id=$request->get('id');
        $arr=DB::table("article")
            ->leftjoin("ar_type","article.a_type","=","ar_type.at_id")
            ->leftjoin('article_zan','article.a_id','=','article_zan.article_id')
            ->groupBy('article.a_id')
            ->select('article.*','ar_type.*',DB::raw('COUNT(article_zan.az_id) as at_zan'))
            ->where("article.a_id",$id)->first();
        $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")
            ->join("article","aping.a_id","=","article.a_id")
            ->orderBy("aping.ap_id","desc")->limit(3)->get();
        return view('article/wxiang',['arr'=>$arr,'username'=>$username,'aping'=>$aping]);
    }
    
    public function wping(Request $request){
        $username=$request->session()->get('username');
        if($username){
            $u_id=0;
        }else{
            $user=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
            $u_id=$user['user_id'];
        }
        echo $u_id;die;
        $a_id=$request->input('a_id');
        $ping=$request->input('ping');
        $sql="insert into aping(u_id,ap_con,a_id) values('$u_id','$ping','$a_id')";
        $re=DB::insert($sql);

        $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")->join("article","aping.a_id","=","article.a_id")->orderBy("aping.ap_id","desc")->limit(3)->get();
        return json_encode($aping);
    }
}
