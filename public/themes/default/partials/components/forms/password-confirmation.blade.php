{{-- Retype Password --}}
<label class="label">Password Confirmation</label>
<p class="control has-icon has-icon-right">
  <input class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" type="password" name="password_confirmation" id="password_confirmation">
  @if($errors->has('password_confirmation'))
      <i class="fa fa-warning"></i>
      <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
  @endif
</p>
