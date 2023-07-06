@extends('admin.layout.default')

@section('content')
    <div class="mb-5">
        @isset($timeline)
            <h2 class="page-title"><i class="fa fa-newspaper"></i>{{ __("Timeline #" . $timeline->id)}}</h2>
            <p class="text-comment"><i class="fa fa-chevron-right"></i>{{ __("Edit timeline") }}</p>
            {{ Form::model($timeline, ['route' => ['admin.timeline.update', $timeline->id], 'method' => 'PUT']) }}
        @else
            <h2 class="page-title"><i class="fa fa-newspaper"></i>{{ __("Timeline") }}</h2>
            <p class="text-comment"><i class="fa fa-chevron-right"></i>{{ __("New timeline") }}</p>
            {{ Form::open(['route' => 'admin.timeline.store']) }}
        @endif

        <div class="d-flex w-100 px-4 gap-2 mb-4 align-items-center justify-content-end">
            <button type="submit" class="btn btn-primary float-end"><i class="fa fa-save"></i>{{__("Save")}}</button>
        </div>
        <div class="row w-100">
            <div class="col-md-10">
                {{ Form::label('title', __('Title'), ['class' => 'form-label']) }}
                {{ Form::text('title', null, ['class' => 'form-control mb-3']) }}
                {{ Form::label('url_key', __('URL Key'), ['class' => 'form-label']) }}
                <p class="text-comment"><i class="fa fa-chevron-right"></i>{{__("If empty will use timeline's title")}}</p>
                {{ Form::text('url_key', null, ['class' => 'form-control mb-3']) }}
                {{ Form::label('short_description', __('Short description'), ['class' => 'form-label']) }}
                {{ Form::text('short_description', null, ['class' => 'form-control mb-3']) }}
                {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                {{ Form::textarea('description') }}
            </div>
            <div class="col-md-2">
                {{ Form::label('state', __('State'), ['class' => 'form-label']) }}
                {{ Form::select('state', \App\Models\Timeline::states(), null, ['class' => 'form-select mb-3']) }}
                {{ Form::label('color', __('Color'), ['class' => 'form-label']) }}
                {{ Form::color('color', null , ['class' => 'form-control form-control-color mb-3']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
