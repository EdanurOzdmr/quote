<div>
    @foreach(json_decode($quotes, true) as $value)
        {{ $value['quote'] }}
    @endforeach
</div>
