<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\home\controller;

use system\model\News;
use system\model\User;

class Model {
	//动作
	public function base() {
		//		$News = new News();
		//		$News->one();
		//		$d    = $News->find( 1 );
		//		dd( $d->title);
		//		$news = News::where('id',99999)->get();
		//		p($news);
		//		foreach($news as $k=>$v){
		//			echo "<li>标题:{$v['title']}</li>";
		//		}

		//		$user = News::find(1);
		//		$user->one();
		//		$user = model('News')->get()->toArray();
		//		p($user);
		//		$News = News::find(1);
		//		$d = $News->where('id','>',1)->field('title')->get();
		//		p($d);
		//		$News          = new News();
		////		$News['id']    = 5;
		//		$News['title'] = '后盾人';
		//		$News->click   = 2000;
		//		$News->author  = '后盾';
		//		$d             = $News->save();
		//		dd( $d );
		//		$News = News::find(1);
		//		$News['author']='后盾人';
		//		$News->save();
		//		$News = new News();
		//		$d = $News->save(array('title'=>'雅虎','click'=>1999));
		//		dd($d);
		//		$News['title'] = '新浪网';
		//		$News->save();
		//		$model =News::find(8);
		//		$model->touch();
		//		$model->title='Tom网';
		//		$model->save();
	}

	public function action() {
		//		$obj         = ( new News() )->find( 1 );
		//		$obj->author = '新浪';
		//		$obj->save();
		//		$d = Db::table("news")->find(1);
		//		$obj = News::find(1);
		//		$obj->click=9000;
		//		$obj->save();
		//		p($obj);

		//		$obj = News::where('id',3)->first();
		//		$obj->title = '后盾网论坛bbs.houdunwang.com';
		//		dd($obj->save());
		//		$obj = News::find(1);
		//		dd($obj['title']);
		//		dd($obj->click);
		//		$res = $obj->toArray();
		//		p($res);

		//		$obj = News::find(1);
		//		$obj->title="向军";
		//		$obj->save();

		//		$obj        = new News;
		//		$obj->title = "雅虎网";
		//		$obj->click = 289;
		//		dd($obj->save());

		//		$res = News::get();
		//		$res[0]['title']='后盾网论坛';
		//		$res[0]->save();
		//		foreach($res as $k=>$v){
		//			echo $k.'==>'.$v['title']."<br/>";
		//		}
		//		p($res->toArray());
		$obj = new News;
		//		$d = $obj->insertGetId(['title'=>'苹果iphone']);
		//		dd($d);
		//		$d = $obj->where('id',10)->update(['title'=>'iphone']);
		//		dd($d);
		//		$d =$obj->where('id',10)->delete();
		//		dd($d);
		//		$news        = $obj->find( 1 );
		//		$news->title = '论坛';
		////		$news->save();
		//		$d = $news->destory();
		//		dd($d);
		//		if ( ! $obj->one() ) {
		//			echo $obj->getError();
		//			message( $obj->getError(), __ROOT__, 'error' );
		//		}
	}

	public function validate() {
		if ( IS_POST ) {
			//			Validate::make( [
			//				[ 'username', function($value){
			//					return Db::table('user')->where('username',$value)->get()?false:true;
			//				}, '帐号已经存在' ]
			//			] );
			//			Validate::extend( 'checkUser', function ( $field, $value, $params ) {
			//				return Db::table('user')->where('username',$value)->get()?false:true;
			//			} );
			//			Validate::make( [
			//				[ 'username', 'required', '用户名不能为空',2 ],
			//				[ 'email', 'email', '邮箱格式错误',5 ]
			//			] );
			//			echo '验证通过了...';

			$obj              = new User();
			$obj['username']  = Request::post( 'username' );
			$obj['password']  = Request::post( 'password' );
			$obj['password2'] = Request::post( 'password2' );
			$obj['email']     = Request::post( 'email' );
			$obj->save();
		}

		return view();
	}

	public function code() {
		Code::make();
	}

	//演示自动完的使用
	public function auto() {
		if ( IS_POST ) {
			$user           = new User();
			$user->username = Request::post( 'username' );
			$user->groupid  = Request::post( 'groupid' );
			$user->age      = Request::post( 'age' );
			$res            = $user->save();
			dd( $res );
		}

		return view();
	}

	//自动过滤处理
	public function filter() {
		if ( IS_POST ) {
			$user = new User();
			foreach ( Request::post() as $k => $v ) {
				$user[ $k ] = $v;
			}
			$user->id = Request::get( 'id' );
			$user->save();
			message( '修改成功' );
		}
		$field = Db::table( 'user' )->find( Request::get( 'id' ) );

		return view()->with( 'field', $field );
	}

	public function map() {
		$user             = new User(38);
		$user['data']     = '666';
		$user['username'] = 'a1';
		$res              = $user->save();
		dd( $res );
		dd( $user->getError() );
		dd( $user['data'] );
	}
}























