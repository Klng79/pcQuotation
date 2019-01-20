@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class="card">
        <div class="card-header">Edit Groups
            <a href="/group" class="btn btn-dark float-right"><i class="fa fa-backspace"></i> </a>
        </div>
        <div class="card-body">
            {!! Form::open(['action' => ['GroupController@update', $group->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Name')}}
                    {{Form::text('name', $group->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
