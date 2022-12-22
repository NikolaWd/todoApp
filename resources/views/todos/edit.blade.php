@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos App</div>

                <div class="card-body">
                    <h4>Edit Form</h4>
                    <form method="POST" action="{{ route('todos.update') }}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea type="text" name="description" class="form-control">
                            {{ $todo->description }}
                          </textarea>
                        </div>
                        <div class="mb-3">
                          <label for="">Status</label>
                          <select name="is_completed" id="" class="form-control">
                            <option disabled selected>Select option</option>
                            <option value="1">Completed</option>
                            <option value="0">Incomeplet</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
