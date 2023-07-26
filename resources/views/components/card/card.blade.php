@props([
    'title' => 'Add a title',
    'link'  => null
])

<div class="border rounded-lg">
    <div class="bg-darkgrey padding text uppercase font-bold">
        @if($link)
        <a href="{{ $link }}">{{ $title }} ></a>
        @else
        {{ $title }}
        @endif
    </div>
    {{ $slot }}
</div>