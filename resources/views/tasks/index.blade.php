@extends('layouts.app')

@section('content')
    <br>
    <div class="panel panel-default">
        <br>
        <div class="panel-body">
            @include('common.errors')
            <form action="{{ url('task') }}" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        <button type="submit" class="btn btn-default">Add Task</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

    @if ($tasks->count() > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>
                                    <form action="{{ url('task/' . $task->id) }}" method="post">
                                        <button type="submit" class="btn btn-danger pull-right">Delete</button>
                                        <!-- method spoofing as you cant specify a delete method in html -->
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
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