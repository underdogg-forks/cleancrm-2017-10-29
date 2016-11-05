@extends('layouts.master')

@section('title', 'User Details')

@section('content')
	<h3>{{ $user->name }} <small>{{ $user->email }}</small></h3>
@endsection