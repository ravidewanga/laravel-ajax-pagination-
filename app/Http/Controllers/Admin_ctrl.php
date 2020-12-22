<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class Admin_ctrl extends Controller
{
    function add_user(Request $req){
		
		 $this->validate($req,[
			 'name'=>'required|max:8',
		  ]);
	
		$save = DB::table('users')->insert(array('name'=>$req->name));
		if($save){
			return response(array('msg'=>'Data saved'),200);
		}else{
			return response(array('msg'=>'Something went wrong.'),500);
		}
	}

	function getList(){
		return view('list');
	}

	function nameList(){
		$list = DB::table('users')->paginate(2);

		$links = $list->links();
        
        $links = str_replace("<a", "<a class='page_click' ", $links);

		return response(array('data'=>$list,'page_link'=>(string)$links),200);
	}
}
