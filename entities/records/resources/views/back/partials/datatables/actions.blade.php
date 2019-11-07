<div class="btn-group">
    <a href="{{ route('back.points-flow-package.records.edit', [$item['id']]) }}" class="btn btn-xs btn-default m-r">
        <i class="fa fa-pencil-alt"></i>
    </a>
    <a href="#" class="btn btn-xs btn-danger delete" data-url="{{ route('back.points-flow-package.records.destroy', [$item['id']]) }}">
        <i class="fa fa-times"></i>
    </a>
</div>
