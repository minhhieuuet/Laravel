<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function Chao()
    {
    	echo "Hello";
    }
    public function KhoaHoc($ten)
    {
    		echo "Khoa hoc ".$ten;

    }
    public function GetURL(Request $request)
    {
    	return $request->url();
    }
    public function postForm(Request $request)
    {
    	echo $request->username;
    }
    //Get set cookie
    public function setCookie()
    {
    	$response=new Response();
    	$response->withCookie ('KhoaHoc','Laravel',1);
    	return $response;
    }
    public function getCookie(Request $request)
    {
    	return $request->cookie('KhoaHoc');
    }

    //upload file
}
