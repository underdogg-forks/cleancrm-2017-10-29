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
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        {!! Theme::partial('components.forms.email') !!}

                        {!! Theme::partial('components.forms.password') !!}

                        {!! Theme::partial('components.forms.password-confirmation') !!}

                        <p class="control">
                            <button type="submit" class="button is-primary">
                                Reset Password
                            </button>
                        </p>
                    </form>

            </div>
          </div>
        </div>
    </div>
</div>
</div>
