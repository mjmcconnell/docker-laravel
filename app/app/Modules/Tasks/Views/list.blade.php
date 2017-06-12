@extends('Base::layouts.app')

@section('content')
    <div ng-controller="ListCtrl" ng-cloak>
        <div ng-init="records = {{ $json_records }}"></div>

        <div class="panel panel-default">
            <div class="panel-heading">Add Task</div>
            <div class="panel-body">
                @include('Base::common.errors')

                <form id="new-record-form" class="form-horizontal">
                    <input type="hidden" value="{{ csrf_token() }}" ng-model="formData._token">

                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" ng-model="formData.name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <md-button class="md-raised md-warn" ng-click="submitForm()" ng-disabled="isProcessing">Submit</md-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Current Tasks</div>
            <table class="table" ng-show="records">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="record in records">
                        <td>
                            {[ record.id ]}
                        </td>
                        <td>
                            <a href="/tasks/{[ record.id ]}">{[ record.name ]}</a>
                        </td>
                        <td>
                            <button>Delete Task</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
