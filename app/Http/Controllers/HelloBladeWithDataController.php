<?php
namespace App\Http\Controllers;  // （1）

use App\Http\Controllers\Controller;  // （2）
//use Illuminate\Http\Request;

class HelloBladeWithDataController extends Controller  // （3）
{
	public function test()  // （4）
	{
		$data["name"] = "武者小路";  // （5）
		return view("helloWithData", $data);  // （5）
	}
    
}
