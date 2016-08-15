<?php
/*
 *公司试题控制器
 *@2016.8.13
 *@wei
 */
namespace App\Http\Controllers;

use DB;
use App\MyModel;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
	/*公司列表*/
	public function index($type=''){
		//查询简历课程
		$re = "select * from direction";
		$ra = DB::select($re);
		//查询公司名称
		$sql = "select * from company";
		$arr = DB::select($sql);
<<<<<<< HEAD
		if($type==''){
			/*简历查询*/
			$user = new MyModel();
			$exam = $user->sql_course(1);
			return view('company/index',['arr'=>$arr,'re'=>$ra,'exam'=>$exam]);	
=======
		$exam = DB::table('shiti')->simplePaginate(8);
		return view('company/index',['arr'=>$arr,'re'=>$ra,'exam'=>$exam]);
	}
	//根据专业查询试题
	public function college(){
		$name = $_GET['name'];
		$arr = DB::table('shiti')->where('direction_name',"$name")->simplePaginate(9);
		return view('company/college',['exam'=>$arr]);
	}
	//根据专业以及公司查询试题
	public function college_x(){
		$name_z = $_GET['name_z'];
		$name_x = $_GET['name_x'];
		if(empty($name_z)){
		$arr = DB::table('shiti')->where('company_name',"$name_x")->simplePaginate(9);
>>>>>>> 9ddbd17434ecf45c4e2ad36f6f43741feff947a8
		}else{
			$user = new MyModel();
			$exam = $user->sql_course($type);
			//print_r($arr);
			return view('company/index',['arr'=>$arr,'re'=>$ra,'exam'=>$exam]);	
		}		
		
	}
	
	//查看简历详情
	public function college_exam(Request $request)
	{
		/*get 接值*/
		$id = $request->input('id');
		$page = $request->input('page');

		/*简历点击量*/
		if(!empty($id)&&$page==1){
			$click = DB::table('shiti')->select('click')->where('s_id', '=', $id)->first();
			
			$click_1 =($click['click'])+1;
		
			$upd = "update shiti set click='$click_1' where s_id='$id'";
			$upd_sav = DB::update($upd); 
		}
		
		//查询简历课程
		$re = "select * from direction";
		$ra = DB::select($re);
		//查询公司名称
		$sql = "select * from company";
		$arr = DB::select($sql);
		
		/*简历详情*/
		$user = new MyModel();
		$exam = $user->sql_jianli($id);

		return view('company/college_exam',['id'=>$id, 'arr'=>$arr,'re'=>$ra,'exam'=>$exam]);
	}
}

