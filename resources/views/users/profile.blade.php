@extends('layouts.master')

@section('title','Profile')

@section('content')
	<h1>Hi {{ Auth::user()->name }}</h1>

	<hr>

	<p>{{ Auth::user()->email }}</p>

	<p>
		Roles:
		<ul>
			@foreach(Auth::user()->roles as $role)
				<li>{{ ucfirst($role->name) }}</li>
			@endforeach
		</ul>
	</p>

	<hr>

	{{-- <h3 class="help">Dashboard</h3>

	<hr> --}}
@endsection