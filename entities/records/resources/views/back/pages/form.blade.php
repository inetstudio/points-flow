@extends('admin::back.layouts.app')

@php
    $title = ($item['id']) ? 'Просмотр записи' : 'Создание записи';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.points-flow-package.records::back.partials.breadcrumbs.form')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="ibox">
            <div class="ibox-title">
                <a class="btn btn-sm btn-white" href="{{ route('back.points-flow-package.records.index') }}">
                    <i class="fa fa-arrow-left"></i> Вернуться назад
                </a>
            </div>
        </div>

        {!! Form::info() !!}

        {!! Form::open(['url' => (! $item->id) ? route('back.points-flow-package.records.store') : route('back.points-flow-package.records.update', [$item->id]), 'id' => 'mainForm', 'enctype' => 'multipart/form-data']) !!}

        @if ($item->id)
            {{ method_field('PUT') }}
        @endif

        {!! Form::hidden('record_id', (! $item->id) ? '' : $item->id, ['id' => 'object-id']) !!}

        {!! Form::hidden('record_type', get_class($item), ['id' => 'object-type']) !!}

        <div class="ibox">
            <div class="ibox-title">
                {!! Form::buttons('', '', ['back' => 'back.points-flow-package.records.index']) !!}
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group float-e-margins" id="mainAccordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#mainAccordion" href="#collapseMain"
                                           aria-expanded="true">Основная информация</a>
                                    </h5>
                                </div>
                                <div id="collapseMain" class="collapse show" aria-expanded="true">
                                    <div class="panel-body">

                                        {!! Form::user('', $item) !!}

                                        {!! Form::points_flow_action('', $item) !!}

                                        {!! Form::string('points', $item->points ?: 0, [
                                            'label' => [
                                                'title' => 'Количество баллов',
                                            ],
                                        ]) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                {!! Form::buttons('', '', ['back' => 'back.points-flow-package.records.index']) !!}
            </div>
        </div>

        {!! Form::close()!!}
    </div>
@endsection
