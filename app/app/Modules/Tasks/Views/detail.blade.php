@extends('Base::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Update Task</div>
        <div class="panel-body">
            @include('Base::common.errors')

            <form action="/api/tasks" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('UPDATE') }}

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ $record->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
