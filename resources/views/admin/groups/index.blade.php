@extends('adminlte::page')
@section('title', trans('group.page.index'))
@section('content_header')
    <h1>{{trans('group.page.index')}}</h1>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/group.css') }}">
@stop
@section('content')
<div class="row">
    <div>
        <div class="col-md-4">
            @include('admin.groups._search_form')
        </div>
        <div class="text-right col-md-8">
            <a href="{{ route('groups.create')}}" class="btn btn-primary">
                {{ trans('common.button.create') }}
            </a>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ trans('group.attribute.id.label') }}</th>
                    <th>
                        <a href="?search={{ request('search') }}&field=name&sort={{ request('sort') == 'desc' ? 'asc' : 'desc' }}">
                            {{ trans('group.attribute.name.label') }}
                        </a>
                    </th>
                    <th>{{ trans('group.attribute.image.label') }}</th>
                    <th>{{ trans('group.attribute.description.label') }}</th>
                    <th colspan = 2>{{ trans('common.button.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td><img class="group-image" src="{{ $group->getImage() }}"></td>
                        <td>{{ $group->description }}</td>
                        <td class="action-group">
                            <a href="{{ route('groups.edit',$group->id) }}" class="btn btn-primary">
                                {{ trans('common.button.edit') }}
                            </a>
                            <a href="{{ route('groups.members.index',$group->id) }}" class="btn btn-info">
                                {{ trans('common.button.member') }} <i class="fa fa-users"></i>
                            </a>
                            <a href="{{ route('groups.announcements.index',$group->id) }}" class="btn btn-info">
                                {{ trans('common.button.announcement') }} <i class="fa fa-bell"></i>
                            </a>
                            <form method="post"
                                  action="{{ route('groups.destroy', $group->id) }}"
                                  onsubmit="return confirm('{{ trans('common.button.confirm_delete') }}');">
                                {!! csrf_field() !!}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('common.button.delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="text-right">
            <ul class="pagination justify-content-end text-right">
                {{ $groups->links() }}
            </ul>
        </nav>
    </div>
    <div>
</div>
@stop
