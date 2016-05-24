@extends ('categories::layouts.master')

@section('page-header')
    <h1>{{ trans('categories::general.title') }}</h1>
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h1 class="box-title">{{ trans('categories::general.title') }}</h3>
            <div class="box-tools pull-right">
                {{-- @include('backend.access.includes.partials.header-buttons') --}}
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <h3>{{ trans('categories::general.title-table') }}<a href="{{ isset($p_parent_id) ? url('/categories/create?parent_id=' . $p_parent_id) : url('/categories/create') }}" class="btn btn-primary pull-right btn-sm">{{ trans('categories::general.add-new') }}</a></h1>
            <ol class="breadcrumb">
              <li><a href="{{ route('categories.index') }}">Categories</a></li>
              @if(!empty($ancestor))
              <li><a href="{{ route('categories.index',['parent_id' => $ancestor->id]) }}">{{ $ancestor->name }}</a></li>
              @endif
              @if(!empty($current))
              <li class="active">{{ $current->name }}</li>
              @endif
            </ol>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('categories::attribute.name') }}</th>
                        <th>{{ trans('categories::attribute.created_at') }}</th>
                        <th>{{ trans('categories::attribute.status') }}</th>
                        <th>{{ trans('categories::attribute.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $k => $category)
                            <tr>
                                <td>{!! $k + $categories->perPage()*($categories->currentPage() - 1) + 1 !!}</td>
                                <td>
                                  <a href="{{ route('categories.index',['parent_id' => $category->id]) }}">
                                        {{ $category->name }}
                                  </a>
                                </td>
                                <td>{!! $category->created_at->diffForHumans() !!}</td>
                                <td>
                                    {{--*/$status = $category->status/*--}}
                                    @if($status)
                                      <span class="label label-success">{{'On'}}</span>
                                    @else
                                      <span class="label label-danger">{{'Off'}}</span>
                                    @endif
                                </td>
                                <td>
                                <div class="col-md-8">
                                  <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="{{ trans('categories::general.edit') }}"></i></a>
                                  <a href="{{ route('categories.destroy', $category->id) }}" data-method="delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="{{ trans('categories::general.delete') }}"></i></a>
                                  <a href="{{ route('categories.moveUp', $category->id) }}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-arrow-up" data-toggle="tooltip" data-placement="top" title="{{ trans('categories::general.up') }}"></i></a>
                                  <a href="{{ route('categories.moveDown', $category->id) }}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-arrow-down" data-toggle="tooltip" data-placement="top" title="{{ trans('categories::general.down') }}"></i></a>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-left">
                {{ trans_choice('categories::general.table.total', $categories->total(), ['total' => $categories->total(), 'count' => $categories->count()]) }}
            </div>
            <div class="pull-right">
                {!! isset($p_parent_id) ? $categories->appends(['parent_id' => $p_parent_id])->render() : $categories->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
