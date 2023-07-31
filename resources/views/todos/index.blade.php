@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if (Session::has('alert-success'))
                <div class="alert alert-success" role="alert">
                    {{ Session('alert-success') }}
                </div>
                @endif
                @if (Session::has('alert-update-success'))
                <div class="alert alert-info" role="alert">
                    {{ Session('alert-update-success') }}
                </div>
                @endif
                @if (Session::has('alert-delete-success'))
                <div class="alert alert-danger" role="alert">
                    {{ Session('alert-delete-success') }}
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($todos) && count($todos) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Serial #</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Complete</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($todos as $row)
                        <tr>
                            <th>{{$row->id}}</th>
                            <td>{{$row->title}}</td>
                            <td>{{$row->description}}</td>
                            <td>
                                @php
                                    if($row->is_completed == 0){
                                        echo '<a href="#" class="btn btn-info">N</a>';
                                    }else{
                                        echo '<a href="#" class="btn btn-success">Y</a>';
                                    }
                                @endphp
                            </td>
                            <td>
                                <a href=" {{url('todos/edit' , $row->id)}} " class="btn btn-warning">E</a>
                                <a href=" {{url('todos/delete/' . $row->id)}} " class="btn btn-danger">D</a>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @else
                    <h4>No Todos are Created Yet</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
