@extends('Base::layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Add Task</div>
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
    </div>

    @if (count($records) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">Current Tasks</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $task)
                        <tr>
                            <td>
                                {{ $task->id }}
                            </td>
                            <td>
                                <a href="/tasks/{{ $task->id }}">{{ $task->name }}</a>
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
    @endif

@endsection
