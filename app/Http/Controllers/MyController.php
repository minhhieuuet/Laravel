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
    //Dang nhap
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
    public function postFile(Request $request)
    {
        if($request->hasFile('myFile'))
        {
            echo "Xac nhan file thanh cong";
            $file=$request->file('myFile');
            $filetype=$file->getClientOriginalExtension('myFile');
            if($filetype=="jpg")
            {
                echo "Day la file anh";
            }
            $filename=$file->getClientOriginalName('myFile');
            $file->move('img',$filename);
        }
        else
        {
            echo "Chua co file";
        }
    }

    //Json xuat du lieu
    public function getJson()
    {
        $array=['mot'=>'hai'];
        return response()->json($array);
    }
    //Lam viec voi view
    public function myView()
    {
        return view('myView');
    }
    //Truyen du lieu tren view
    public function ten($ten)
    {
        return view('myView',['ten'=>$ten]);
    }
    
}
