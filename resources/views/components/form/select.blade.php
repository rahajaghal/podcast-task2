@props([
    'label'=>'',
    'name'=>'',
    'options'=>[],
    'selected',
])
<label for="{{ $name }}">{{ $name }}</label>
<select 
class="form-control
@error('{{ $name }}')
    is-invalid
@enderror
"
 name="{{ $name }}"
 >
    <option value="">Select An Option</option>
    @foreach ($options as $value =>$text)
        <option 
        value="{{ $value }}"
        @if ($value ==old($name,$selected)) selected @endif
        >
            {{ $text }}
        </option>
    @endforeach
</select>
@error('name')
    <div class="text-danger">{{ $message }}</div>
@enderror