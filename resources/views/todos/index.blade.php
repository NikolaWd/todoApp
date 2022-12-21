@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                @if (Session::has('alert-success'))

                    <div class="alert alert-success" role="alert">
                        {{ Session::get('alert-success') }}
                    </div>

                @endif


                @if (Session::has('error'))

                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>

                @endif
                    

                    @if (count($todos) > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Completed</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <?php $count = 1; ?>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $todo->title }}</td>
                                        <td>{{ $todo->description }}</td>
                                        <td>

                                            @php
                                                if($todo->is_completed == 1){
                                                    echo '<a href="" class="btn btn-success btn-sm mx-2">Completed</a>';
                                                }
                                                else {
                                                    echo '<a href="" class="btn btn-warning btn-sm mx-2">Incomplet</a>';
                                                }
                                            @endphp 

                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('todos.show', $todo->id)}}" class="btn btn-success btn-sm mx-1">View</a> 
                                            <a href="" class="btn btn-primary btn-sm mx-1">Edit</a>                                             
                                            <form action="" class="mx-1">
                                                <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                        
                    @else

                        <h4>No todos are created yet.</h4>
                    
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
