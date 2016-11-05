<div class="section">
<div class="columns">
    <div class="column is-half is-offset-one-quarter">
        <div class="card is-fullwidth">
            <header class="card-header">
            <p class="card-header-title">
              Login
            </p>
            </header>
          <div class="card-content">
            <div class="content">
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    {!! Theme::partial('components.forms.email') !!}

                    {!! Theme::partial('components.forms.password') !!}

                    {!! Theme::partial('components.forms.remember') !!}

                    <p class="control">
                        <button type="submit" class="button is-primary">Login</button>
                        <a class="button is-link" href="{{ url('/password/reset') }}"> Forgot Your Password?</a>
                        @if(config('auth.oauth.facebook') && config('services.facebook'))
                            <a href="{{ url('/auth/facebook') }}" class="button  is-info is-pulled-right">
                              <span class="icon"><i class="fa fa-facebook"></i></span><span> Facebook</span>
                            </a>
                        @endif
                    </p>
                    <hr>
                    <p class="control">
                         <a class="button is-link" href="{{ url('/register') }}"> Not yet register?</a>
                    </p>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
