<?php 
	
	Route::get('thongtin','Controller@getinfo');
	Route::get('call-view','Controller@getinfo');
	Route::group(['prefix'=>'thuc-don'],function()
	{
		Route::get('',function(){
			return view('view1');
		});
		Route::get('chim',function(){
			echo "Chim hầm ngũ quả";
		});
		Route::get('cá',function(){
			echo "Cá rán ";
		});
		Route::get('rắn',function(){
			echo "Rắn ướp gừng";
		});

	});
	Route::get('tin','Controller@getinfo');
	View::share('ten','Đỗ Minh Hiếu');
	Route::get('kiem-tra',function()
	{

	});
	
	Route::get('vonglap',function()
		{
			for($i=0;$i<5;$i++)
			{
				echo "HiHi";
			}
		});
		
	Route::get('HoTen/{ten}',function($ten){

		echo "Ten tao la".$ten;
	});
	Route::get('controller','MyController@Chao');
	Route::get('Thamso/{ten}','MyController@KhoaHoc');
	///URL

	Route::get('MyRequest','MyController@GetURL');
	//Nhan gui du lieu

	Route::get('getForm',function(){
		return view('postForm');
	});
	Route::post('postForm',['as'=>'postForm','uses'=>'MyController@postForm']);
	//Cookie
	Route::get('setCookie','Mycontroller@setCookie');
	Route::get('setCookie','Mycontroller@getCookie');
 ?>