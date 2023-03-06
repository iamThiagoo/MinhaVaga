@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:border-sky-600 focus:ring-sky-600 rounded-md shadow-sm']) !!}>
