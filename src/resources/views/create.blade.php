@extends ('categories::layouts.master')

@section('page-header')
    <h1>
        {!! trans('categories::general.title') !!}
        <small>{{ trans('categories::general.title-create') }}</small>
    </h1>
@endsection
@section('content')
    {!! $formCategory::model($model, [
          'route' => isset($p_parent_id) ? ['categories.store', 'parent_id' => $p_parent_id] : ['categories.store'],
          'class' => 'form-horizontal',
          'role' => 'form',
          'method' => 'POST'
    ]) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('categories::general.title-create') }}</h3>
            </div><!-- /.box-header -->
            {!! $formCategory::hidden('id') !!}
            <div class="box-body">
                <div class="form-group">
                    {!!
                        $formCategory::label('name', trans('categories::attribute.name'), [
                          'class' => 'col-lg-2 control-label'
                        ])
                    !!}
                    <div class="col-lg-10">
                        {!! $formCategory::text('name', null, [
                              'class' => 'form-control',
                              'placeholder' => trans('categories::attribute.name')
                            ])
                        !!}
                    </div>
                </div>
                <div class="form-group">
                    {!!
                        $formCategory::label('description', trans('categories::attribute.description'), [
                          'class' => 'col-lg-2 control-label'
                        ])
                    !!}
                    <div class="col-lg-10">
                        {!! $formCategory::text('description', null, [
                              'class' => 'form-control',
                              'placeholder' => trans('categories::attribute.description')
                            ])
                        !!}
                    </div>
                </div>
                <div class="form-group">
                    {!!
                        Form::label('status', trans('categories::attribute.status'), [
                          'class' => 'col-lg-2 control-label'
                        ])
                    !!}

                    <div class="col-lg-10">
                        {!! Form::checkbox('status', null, (bool)$model->status) !!}
                    </div>
                </div>
                {{ Html::style('vendor/kun-category/bootstrap-switch/css/bootstrap-switch.min.css') }}
                {{ Html::script('vendor/kun-category/bootstrap-switch/js/bootstrap-switch.min.js') }}
                {{ Html::script('vendor/kun-category/bootstrap-switch/js/switch-button.js') }}
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="box-tools pull-right">
                    <a href="{{ URL::previous() }}" class="btn btn-default btn-xs">{{ trans('categories::general.button.cancel') }}</a>
                    <input type="submit" class="btn btn-success btn-xs" value="{{ $model->id ? trans('categories::general.button.edit') : trans('categories::general.button.create') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! $formCategory::close() !!}
@endsection
