@props([
    'title' => 'Add a title',
    'link'  => null
])

<div class="">
    <div class="bg-darkgrey border rounded-t-lg padding text uppercase font-bold">
        @if($link)
        <a href="{{ $link }}">{{ $title }} ></a>
        @else
        {{ $title }}
        @endif
    </div>
    {{ $slot }}
</div>