@extends('admin.layout.default')


@section('content')

    <h2 class="page-title"><i class="fa fa-cog"></i>{{ __("Settings") }}</h2>
    <p class="text-comment mb-5"><i class="fa fa-chevron-right"></i>{{__("Platform's configuration")}}</p>


    {{ Form::model(Auth::user(), ['route' => ['admin.user.update', Auth::user()->id], 'method' => 'PUT']) }}
    <div class="d-flex w-100 px-4 gap-2 mb-4 align-items-center justify-content-end">
        <button type="submit" class="btn btn-primary float-end"><i class="fa fa-save"></i>{{__("Save")}}</button>
    </div>

    {{ Form::label('locale', __('Locale'), ['class' => 'form-label']) }}
    {{ Form::select('locale', ['pt_BR'=>'pt_BR', 'en_US'=>'en_US'], null, ['class' => 'form-select mb-3 w-25']) }}
    {{ Form::close() }}

@stop
