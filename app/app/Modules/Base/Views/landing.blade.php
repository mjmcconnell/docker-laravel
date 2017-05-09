@extends('Base::layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Hello, world!</h1>
        <p>This is a simple app setup to explore using a modular approach to building laravel apps</p>
        <p>So far, it only has one module, (excluding the base module), but should contain enough to build most types you will likely encounter.</p>
        <p><a class="btn btn-primary btn-lg" href="/tasks" role="button">View Tasks Module</a></p>
    </div>
@endsection
