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
            ->select()
			->simplePaginate(5);
		return $users;	
	}
}