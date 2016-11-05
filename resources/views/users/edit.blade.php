@extends('layouts.master')

@section('title', 'Update user')

@section('content')

{{-- Use method post, action to users --}}
<form class="form-horizontal" method="POST" action="{{ url('/users/'.$user->id) }}">
<fieldset>

{{-- Spoofing method --}}
{{ method_field('PUT') }}

{{ csrf_field() }}

<!-- Form Name -->
<legend>User Details</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="" value="{{ $user->name }}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="" class="form-control input-md" required="" value="{{ $user->email }}">
    
  </div>
</div>

@include('components.checkboxes',['options' => $roles,'label' => 'Role', 'selected' => $user->roles, 'name' => 'role_id'])

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Update</button>
    <a href="{{ url('/users') }}" class="btn btn-danger">Cancel</a>
  </div>
</div>

</fieldset>
</form>

@endsection