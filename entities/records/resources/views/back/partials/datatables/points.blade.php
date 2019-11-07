@if ($item['points'] > 0)
    <strong class="btn-primary btn-outline">+{{ $item['points'] }}</strong>
@elseif ($item['points'] < 0)
    <strong class="btn-danger btn-outline">{{ $item['points'] }}</strong>
@else
    <strong>{{ $item['points'] }}</strong>
@endif
