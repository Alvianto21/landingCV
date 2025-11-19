@props(['id', 'name', 'value', 'error'])
<label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $slot }}</label>
<input type="file" name="{{ $name }}" id="{{ $id }}" class="cursor-pointer bg-neutral-secondary-medium bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old($value) }}" {{ $attributes }} accept="image/*">
<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPEG, or JPG.</p>
<x-input-error :messages="$errors->get($error)" class="mt-2" />