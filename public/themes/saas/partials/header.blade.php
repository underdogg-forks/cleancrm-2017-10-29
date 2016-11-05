<header>
@if(Auth::guest())
	{!! Theme::partial('navigations.welcome') !!}
@endif
</header>
