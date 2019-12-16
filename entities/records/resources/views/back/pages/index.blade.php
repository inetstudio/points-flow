@extends('admin::back.layouts.app')

@php
    $title = 'Записи';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.points-flow-package.records::back.partials.breadcrumbs.index')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{ route('back.points-flow-package.records.create') }}" class="btn btn-sm btn-primary btn-lg">Добавить</a>
                        <div class="ibox-tools">
                            <a href="{{ route('back.points-flow-package.records.export') }}" class="btn btn-primary btn-sm">Экспорт</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{ $table->table(['class' => 'table table-striped table-bordered table-hover dataTable']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushonce('scripts:datatables_points_flow_records_index')
    {!! $table->scripts() !!}
@endpushonce
