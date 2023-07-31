@extends('layouts.app')
@php
//echo url('todos/editSave/' . $todoInfo[0]->id);die;
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Todos') }}</div>

                <div class="card-body">
                    <h1>Edit</h1>
                    <form action="{{url('todos/editSave')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="@if(isset($todoInfo) && !empty($todoInfo)){{$todoInfo[0]->title}} @endif">
                        </div>
                        <input type="hidden" name="todoID" class="form-control" value="@if(isset($todoInfo) && !empty($todoInfo)){{$todoInfo[0]->id}} @endif">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description" cols="20" rows="10" class="form-control">
                                @if(isset($todoInfo) && !empty($todoInfo)){{$todoInfo[0]->description}} @endif
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
