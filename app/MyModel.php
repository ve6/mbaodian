<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class MyModel extends Model
{
	/*简历模块*/
    public function sql_course($type)
	{		
		if($type==1){
			//echo 123;
			$users = DB::table('direction')
            ->join('shiti', 'shiti.d_id', '=', 'direction.d_id')           
            ->select('direction.d_name', 'direction.d_href', 'shiti.s_id', 'shiti.s_img', 'shiti.s_logo', 'shiti.click' )
			->orderBy('shiti.click', 'desc')
			->simplePaginate(9);
            
		}else{
			$users = DB::table('direction')
            ->join('shiti', 'shiti.d_id', '=', 'direction.d_id')             
            ->select('direction.d_name', 'direction.d_href', 'shiti.s_id', 'shiti.s_img', 'shiti.s_logo', 'shiti.click' )
		    ->where('direction.d_name', '=', $type)
			->orderBy('shiti.click', 'desc')
			->simplePaginate(9);
			 
		}
		
		return $users;
	}   
	
	/*简历详情模块*/
    public function sql_jianli($id)
	{
		$users = DB::table('shiti')
		->join('image', 'shiti.s_id', '=', 'image.s_id') 
		->select('image.img')
		->where('image.s_id', '=', $id)
		->simplePaginate(1);
		return $users;
	}
}
