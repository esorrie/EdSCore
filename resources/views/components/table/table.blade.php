@props([
    'tableData' => [
        0 => [
            [
                'data' => 'Manager',
                'style' => 'bg-red-500'
            ],
            [
                'data' => 'Eddie Howe',
                'style' => ''
            ],
        ],
        1 => [
            [
                'data' => 'Stadium',
                'style' => 'bg-red-500 uppercase'
            ],
            [
                'data' => 'St James\' Park',
                'style' => ''
            ],
        ] 
    ],
    'headers' => []
])

<div class="grid grid-cols-{{ count($tableData[0]) }} grid-rows-{{ count($tableData) }} details">
    
    @foreach ($tableData as $data)
        @foreach ($data as $column )
            <div class="border text-sm text smallpadding {{ $column['style'] }}">{{ $column['data'] }}</div>
        @endforeach 
    @endforeach
</div>