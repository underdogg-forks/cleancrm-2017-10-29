<div class="section">
<div class="columns">
    <div class="column is-half is-offset-one-quarter">
        <div class="card is-fullwidth">
            <header class="card-header">
            <p class="card-header-title">
              Register
            </p>
            </header>
          <div class="card-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                {!! Theme::partial('components.forms.name') !!}

                {!! Theme::partial('components.forms.email') !!}

                {!! Theme::partial('components.forms.password') !!}

                {!! Theme::partial('components.forms.password-confirmation') !!}

                <p class="control">
                    <button type="submit" class="button is-primary">Register</button>
                </p>

                <hr>

                <p class="control">
                    <a class="button is-link" href="{{ url('/login') }}"> Already register?</a>
                </p>

            </form>
          </div>
        </div>
    </div>
</div>
</div>
