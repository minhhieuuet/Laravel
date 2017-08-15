@extends('layouts.master')

@section('NoiDung')
@for($i=0;$i<5;$i++)
{{$ten}}
@endfor
<h2>Hi Hi</h2>
@endsection
<?php $so=array('Mot','Hai','Ba'); ?>
@forelse($so as $value)
{{$value}}
@empty
{{"Mang rong"}}
@endforelse
