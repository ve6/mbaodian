<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Question extends Model
{
	/*答疑首页model层*/
    public function question_sql()
	{
		
		$users = DB::table('t_tw')
            ->join('direction', 'direction.d_id', '=', 't_tw.d_id')           
            ->join('users', 'users.user_id', '=', 't_tw.user_id')           
            ->select('direction.d_name', 'users.user_name', 't_tw.t_title', 't_tw.t_content', 't_tw.t_id')
			->orderBy('add_time', 'desc')
			->simplePaginate(5);
		return $users;	
	}
	/*
	 *@答疑问题查看
	 *@t_tw
	 *@2016.8.16
	 */
	public function tw_sql($id)
	{
		
		$users = DB::table('t_tw')
				->where('t_id', '=', $id)
                ->orderBy('add_time', 'desc')
                ->first();
		return $users;
	}
	/*
	 *@答疑问题查看
	 *@t_tw
	 *@2016.8.16
	 */
	 public function comments($id)
	 {
		$arr_com = DB::table('comments')
			 ->join('users', 'comments.user_id', '=', 'users.user_id')           
             ->join('t_tw', 't_tw.t_id', '=', 'comments.t_id') 
			 ->where('comments.t_id', '=', $id)
			 ->orderBy('comments.com_addtime', 'desc')
			 ->simplePaginate(5);
		return $arr_com;
	 }
}