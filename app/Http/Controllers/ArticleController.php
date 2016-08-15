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
        $file=$request->file('a_logo');
        if($file){
            if($file -> isValid()){
                $arr=['jpg','png','gif'];
                $type = $file -> getClientOriginalExtension();
                if(in_array($type,$arr)){
                    echo 1;
                }else{
                    echo 0;
                }
                $path = $file -> move('storage/uploads');
            }
        }

        print_r($file);die;
        $a_addtime=date("Y-m-d H:i:s");
        $re=DB::insert("insert into article(a_title,a_type,a_con,a_addtime) values('$a_title',$a_type,'$a_con','$a_addtime')");
        if($re){
            echo "<script>alert('提交成功');location.href='article';</script>";
        }else{
            echo "<script>alert('提交失败');history.go(-1);</script>";
        }
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
        $zan=DB::table('article_zan')->select('az_id')
            ->where(['article_id'=>$id,'u_id'=>$request->session()->get('u_id')])
            ->first();
        $collect=DB::table('article_collect')->select('ac_id')
            ->where(['a_id'=>$id,'u_id'=>$request->session()->get('u_id')])
            ->first();
        $reply=DB::table('article_reply')
            ->leftjoin('users','article_reply.u_id','=','users.user_id')
            ->leftjoin('article','article_reply.a_id','=','article.a_id')
            ->select('article_reply.*','users.user_nickname','users.user_name')
            ->orderby('article_reply.ar_id','desc')
            ->where('article.a_id',$id)
            ->get();
        return view('article/wxiang',['arr'=>$arr,'username'=>$username,'aping'=>$aping,'zan'=>$zan,'collect'=>$collect,'reply'=>$reply,'aid'=>$id]);
    }

    /*
     * 点赞
     */
    public function zan(Request $request){
        $a_id=$request->input('zan');
        $arr=DB::table('article_zan')->where(['article_id'=>$a_id,'u_id'=>$request->session()->get('u_id')])->first();
        if($arr){
            echo 2;
        }else{
            $add=DB::insert('insert into `article_zan` (u_id, article_id) values (?, ?)', [$request->session()->get('u_id'),$a_id]);
            if($add){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    /*
     * 收藏
     */
    public function collect(Request $request){
        $collect=$request->input('collect');
        $arr=DB::table('article_collect')
            ->where(['a_id'=>$collect,'u_id'=>$request->session()->get('u_id')])
            ->first();
        if($arr){
            echo 2;
        }else{
            $add=DB::insert('insert into `article_collect` (u_id, a_id) values (?, ?)', [$request->session()->get('u_id'),$collect]);
            if($add){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
    public function wping(Request $request){
        $arr['a_id']=$request->input('id');
        $arr['u_id']=$request->session()->get('u_id');
        $arr['a_content']=$request->input('content');
        $arr['a_time']=time();
        if(DB::table('article_reply')->insert($arr)){
            $reply=DB::table('article_reply')
                ->leftjoin('users','article_reply.u_id','=','users.user_id')
                ->leftjoin('article','article_reply.a_id','=','article.a_id')
                ->select('article_reply.*','users.user_nickname','users.user_name')
                ->orderby('article_reply.ar_id','desc')
                ->where('article.a_id',$arr['a_id'])
                ->get();
//            print_r($reply);die;
            $str='';
            $count=count($reply);
            foreach($reply as $v){
                $time=time()-$v['a_time'];
                if($time<3600){
                    $date=floor($time/60).'分钟前';
                }elseif(date('Y-m-d',$v['a_time'])==date('Y-m-d',time())){
                    $date=floor($time/3600).'小时前';
                }elseif(date('Y-m-d',$v['a_time'])==date('Y-m-d',time()-24*3600)){
                    $date='昨天';
                }else{
                    $date=date('Y-m-d',$v['a_time']);
                }
                if($v['user_nickname']!=''){
                    $name=$v['user_nickname'];
                }elseif($v['user_name']!=''){
                    $name=$v['user_name'];
                }else{
                    $name='无名称';
                }
                $str.='<div class="comment-box"><div class="comment clearfix"><div class="feed-author l"><a href="/u/1938237/articles"><img width="40" src="http://img.mukewang.com/5458640c0001b0a702200220-100-100.jpg"></a><a target="_blank" href="/u/1938237/articles" class="nick">'.$name.'</a><span class="com-floor r">'.$count.'F</span></div><div class="feed-list-content"><p></p><p>'.$v['a_content'].'</p><p></p><div class="comment-footer"><span class="feed-list-times">'.$date.'</span><span data-username="'.$name.'" data-uid="1938237" data-commentid="23493" class="reply-btn">回复</span><span data-username="'.$name.'" data-uid="1938237" data-commentid="23493" class="agree-with r"><b>赞同</b><em>1</em></span></div></div></div><div class="reply-box"></div><div class="release-reply"><a class="user-head" href="/u/3071208/articles"><img alt="凤颖" src="http://img.mukewang.com/images/unknow-160.png"></a><a class="nick" href="/u/3071208/articles">凤颖</a><div class="replay-con"><div class="textarea-wrap"><textarea placeholder="写下你的回复..."></textarea></div><p class="errtip"></p><div class="reply-ctrl clearfix"><div class="verify-code"></div><div class="btn-wrap"><div class="cancel-btn">取消</div><div class="release-reply-btn" data-comment-uid="1938237">提交</div></div></div></div></div></div>';
                $count--;
            }
            echo $str;
        }
    }
}
