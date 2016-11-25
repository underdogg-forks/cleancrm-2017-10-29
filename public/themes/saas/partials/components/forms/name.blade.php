{{-- Name --}}
<label class="label">Name</label>
<p class="control has-icon has-icon-right">
  <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name" id="name" required>
  @if($errors->has('name'))
      <i class="fa fa-warning"></i>
      <span class="help is-danger">{{ $errors->first('name') }}</span>
  @endif
</p>
