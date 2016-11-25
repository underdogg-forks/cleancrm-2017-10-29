{{-- E-mail Address --}}
<label class="label">E-mail Address</label>
<p class="control has-icon has-icon-right">
  <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" name="email" id="email">
  @if($errors->has('email'))
      <i class="fa fa-warning"></i>
      <span class="help is-danger">{{ $errors->first('email') }}</span>
  @endif
</p>
