{{-- Password --}}
<label class="label">Password</label>
<p class="control has-icon has-icon-right">
  <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" id="password">
  @if($errors->has('password'))
      <i class="fa fa-warning"></i>
      <span class="help is-danger">{{ $errors->first('password') }}</span>
  @endif
</p>
