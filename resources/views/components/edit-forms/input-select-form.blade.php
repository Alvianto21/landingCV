@props(['id', 'name', 'options', 'value', 'default', 'error'])
<label for="{{ $id }}" class="block mb-2.5 text-sm font-medium text-heading">{{ $slot }}</label>
<select id="{{ $id }}" name="{{ $name }}" {{ $attributes }} class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
    <option value="" selected disabled>{{ $slot }}</option>
    @foreach ($options as $option => $item)
        <option value="{{ $option }}" {{ old($value, $default) == $option ? 'selected' : '' }}>{{ $item }}</option>       
    @endforeach
</select>
<x-input-error :messages="$errors->get($error)" class="mt-2" />