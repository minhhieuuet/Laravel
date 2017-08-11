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
}
