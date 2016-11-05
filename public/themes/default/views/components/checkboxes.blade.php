<div class="form-group">
  <label class="col-md-4 control-label" for="{{ $name or 'select' }}">{{ $label }}</label>
  <div class="col-md-4">
    @foreach($options as $option)
		<div class="checkbox">
			<label>
				<input name="{{ $name or 'checkbox' }}[{{ $option->id }}]" 
					type="checkbox" value="{{ $option->id }}" 
					@foreach($selected as $select)
						{{ ($select->id == $option->id ? 'checked' : '') }}
					@endforeach
					>
				{{ $option->name }}
			</label>
		</div>
	@endforeach
  </div>
</div>

