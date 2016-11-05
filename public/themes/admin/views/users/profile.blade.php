
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
