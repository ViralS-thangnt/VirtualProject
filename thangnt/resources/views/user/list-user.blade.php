@extends('layout.master')
@section('header-items')


@stop

@section('content')
@if(isset($allow_access) and $allow_access)

	@include('user.table')

@else
	Access Denied .
@endif

	
		
@stop