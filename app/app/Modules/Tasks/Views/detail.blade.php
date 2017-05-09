@extends('Base::layouts.app')

@section('extra_scripts')
    <script src="/js/form.js"></script>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Update Task</div>
        <div class="panel-body">
            @include('Base::common.errors')

            <form id="update-record-form" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ $record->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default" onclick="$(this).UpdateRecord({{ $record->id }});">
                            <i class="fa fa-plus"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
