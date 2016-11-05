@extends('layouts.master')

@section('title', 'User List')

@section('content')
	<a href="{{ url('/users/create') }}" class="btn btn-success pull-left">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	</a>
	<div class="pull-right">
		{{ $users->links() }}
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Roles</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			{{-- comment here --}}
			@forelse($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>
					<ul class="list-unstyled">
					@foreach($user->roles as $role)
						<li>{{ ucfirst($role->name) }}</li>
					@endforeach
					</ul>
				</td>
				<td>

					@permission('users-show')
						<a href="{{ url('/users/'.$user->id) }}" class="btn btn-primary btn-sm">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</a>
					@endpermission

					@permission('users-edit')
						<a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					@endpermission

					@permission('users-delete')
						<a href="{{ url('/users/'.$user->id) }}" class="btn btn-danger btn-sm"
						data-method="delete"
						data-token="{{csrf_token()}}"
						data-confirm="Are you sure?">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					@endpermission

				</td>
			</tr>
			@empty
			<tr>
				<td colspan="2">No users available</td>
			</tr>
			@endforelse
		</tbody>
	</table>
	<div class="pull-right">
		{{ $users->links() }}
	</div>
@endsection


@section('scripts')
	<script type="text/javascript" src="{{ url('/js/delete.js') }}"></script>
@endsection
