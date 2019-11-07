@if ($item['action'])
    <a href="{{ route('back.points-flow-package.actions.edit', [$item['action']['id']]) }}">
        {{ $item['action']['name'] }}
    </a>
@endif
