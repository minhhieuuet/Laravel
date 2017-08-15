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
	//upfile
	Route::get('upFile',function (){
		return view('postFile');
	});
	Route::post('postFile',['as'=>'postFile','uses'=>'MyController@postFile']);
	//Jason
	Route::get('getJson','MyController@getJson');
	//Lam viec voi view
	Route::get('myView','MyController@myView');
	//Truyen du lieu sang view
	Route::get('View/{ten}','MyController@ten');
	//Dùng chung view
	View::share('ten','Do Minh Hieu');
	//Blade template
	Route::get('blade',function(){
		$ten="<h1>do minh hieu<h1>";
		return view('layouts.laravel',['ten'=>$ten]);
	});
	//Database 
	//Tạo bảng
	Route::get('database',function(){
		Schema::create('loaisanpham',function($table){
			$table->increments('id');
			$table->string('tensanpham',125);
		});
		echo "Tao bang thanh cong";
	});
	//----------------
	//Liên kết bảng
	Route::get('lienketbang',function(){
		Schema::create('sanpham',function($table){
			$table->increments('id');
			$table->string('ten');
			$table->float('gia');
			$table->integer('soluong')->default(0);
			$table->integer('id_loaisanpham')->unsigned();
			$table->foreign('id_loaisanpham')->reference('id')->on('loaisanpham');
		});
	});
	//Xóa bảng
	//Dùng drop nếu không có bảng sẽ báo lỗi
	Route::get('xoabang',function(){
		Schema::drop('sanpham');
	});
	//Dùng dropIfExists kiểm tra xem có bảng không rồi mới xóa
	Route::get('xoabang1',function()
	{
		Schema::dropIfExists('sanpham');
	});
	//Lay du lieu database
	Route::get('database',function(){

		$data=DB::table('users')->get();
		foreach ($data as $row) {
			# code...
			foreach ($row as $key => $value) {
				# code...
				echo $key.":".$value."<br>";
			}
			echo "<hr>";
		}
	});
	//Loc trong database co id = 2
	Route::get('databasewhere',function(){

		$data=DB::table('users')->where('id','=',2)->get();
		foreach ($data as $row) {
			# code...
			foreach ($row as $key => $value) {
				# code...
				echo $key.":".$value."<br>";
			}
			echo "<hr>";
		}
	});
	//Select id,name,email ....
	Route::get('databaseselect',function(){

		$data=DB::table('users')->select('id','name','email')->where('id',2)->get();
		foreach ($data as $row) {
			# code...
			foreach ($row as $key => $value) {
				# code...
				echo $key.":".$value."<br>";
			}
			echo "<hr>";
		}
	});
	//Nhung lenh truy van database, orderby
	Route::get('database/truyvan',function(){

		$data=DB::table('users')->select(DB::raw('id,name as hoten,email'))->orderby('id','asc')->get();
		foreach ($data as $row) {
			# code...
			foreach ($row as $key => $value) {
				# code...
				echo $key.":".$value."<br>";
			}
			echo "<hr>";
		}
	});
	//Cap nhat database UPDATE
	Route::get('database/update',function(){

		$data=DB::table('users')->where('id',1)->update(['name'=>'Minh','email'=>'hiha@gmail.com'])->get();
		foreach ($data as $row) {
			# code...
			foreach ($row as $key => $value) {
				# code...
				echo $key.":".$value."<br>";
			}
			echo "<hr>";
		}
	});
	//Su dung model
	Route::get('model',function(){
		$user=new App\User(); 					//
		$user->name="Nga";						//Khai báo
		$user->email="nga@gmail.com";			//
		$user->password="mothaiba";				//
		$user->save();  				//Để lưu

	});
	//Tim kiem (id=4)
	Route::get('model/timkiem',function(){
		$user=App\User::find(4);
		echo $user->name;
	});
 ?>