@if ($item['user'])
    <a href="{{ route('back.acl.users.edit', [$item['user']['id']]) }}">
        {{ $item['user']['name'] }}
    </a>
@endif
