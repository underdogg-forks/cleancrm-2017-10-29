<div class="form-group">
  <label class="col-md-4 control-label" for="{{ $name or 'select' }}">{{ $label }}</label>
  <div class="col-md-4">
    <select name="{{ $name or 'select' }}" id="{{ $name or 'select' }}" class="form-control input-md">
		<option value="">-- Select One --</option>
		@foreach($options as $option)
			<option value="{{ $option->id }}" {{ ($selected == $option->id ? 'selected' : '') }}>{{ $option->name }}</option>
		@endforeach
	</select>
  </div>
</div>