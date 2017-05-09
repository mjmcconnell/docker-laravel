@extends('Base::layouts.app')

@section('content')
    <div class="panel-body">
        @include('Base::common.errors')

        <form action="/api/tasks" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($records) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($records as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->id }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td class="table-text">
                                    <a href="/tasks/{{ $task->id }}">View</a>
                                </td>

                                <td>
                                    <form action="/api/tasks/{{ $task->id }}/delete" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
