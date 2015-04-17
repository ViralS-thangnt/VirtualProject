@extends('layout.master')
@section('header-items')


@stop

@section('content')
@if(checkPermission())

	@include('user.table')

@else
	@include('user.access-denied')

@endif

	
		
@stop