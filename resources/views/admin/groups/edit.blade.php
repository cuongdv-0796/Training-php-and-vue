@extends('adminlte::page')
@section('title', trans('group.page.edit'))
@section('content_header')
    <h1 class="text-center">{{ trans('group.page.edit') }}</h1>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/group.css') }}">
@stop
@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="box box-primary">
        <div class="box-body">
            <form method="post" action="{{ route('groups.update', $group->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('admin.groups._form')
                <button type="submit" class="btn btn-primary">{{ trans('common.button.edit') }}</button>
                <a href="{{ route('groups.index')}}" class="btn btn-default">{{ trans('common.button.back') }}</a>
            </form>
        </div>
    </div>
</div>
@stop
