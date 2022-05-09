@props([
    'disabled' => false,
    'error' => false,
])

<input
    {{ $disabled ? 'disabled'  : '' }}
    {!! $attributes->merge([
        'class' => 'rounded-md shadow-sm'
        . ($errors->has($error) ? ' border-red-600 focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-50': ' border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50')
        . ($disabled ? ' bg-slate-100' : '')
    ]) !!}
>
