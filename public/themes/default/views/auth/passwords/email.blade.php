<div class="section">
<div class="columns">
    <div class="column is-half is-offset-one-quarter">
        <div class="card is-fullwidth">
            <header class="card-header">
            <p class="card-header-title">
              Reset Password
            </p>
            </header>
          <div class="card-content">
            <div class="content">
                 @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}

                    {!! Theme::partial('components.forms.email') !!}

                    <p class="control">
                        <button type="submit" class="button is-primary">Send Password Reset Link</button>
                        <a class="button is-link" href="{{ url('/login') }}"> Already register?</a>
                        <a class="button is-link" href="{{ url('/register') }}"> Not yet register?</a>
                    </p>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
