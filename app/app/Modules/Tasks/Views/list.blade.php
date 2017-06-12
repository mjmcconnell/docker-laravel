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
            <md-list>
                <md-subheader class="md-no-sticky">Tasks</md-subheader>
                <md-toolbar class="md-theme-light">
                    <h2 class="md-toolbar-tools"  layout="row">
                        <span flex="10">ID</span>
                        <span flex="70">Name</span>
                        <span flex="20">Actions</span>
                    </h2>
                </md-toolbar>
                <md-list-item ng-repeat="record in records" layout="row">
                    <p flex="10">{[ record.id ]}</p>
                    <p flex="70"><a href="/tasks/{[ record.id ]}">{[ record.name ]}</a></p>
                    <div flex="20">
                        <md-button class="md-raised md-warn" ng-click="deleteSelected($index)">Delete</md-button>
                    </div>
                </md-list-item>
            </md-list>
        </div>
    </div>

@endsection
