@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class="card">
        <div class="card-header">Edit Part
            <a href="/part" class="btn btn-dark float-right"><i class="fa fa-backspace"></i> </a>
        </div>
        <div class="card-body">
            {!! Form::open(['action' => ['PartController@update', $part->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Name')}}
                    {{Form::text('name', $part->name, ['class' => 'form-control', 'placeholder' => 'Enter Part Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('title', 'Group')}}
                    {{Form::select('group', [$grouplist->pluck('name', 'id')], $part->group_id ,['placeholder' => 'Select Part Group', 'class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{form::label('title', 'Price')}}
                    {{Form::text('price', $part->price, ['class' => 'form-control', 'placeholder' => 'Enter Price'])}}
                </div>
            {{Form::hidden('_method', 'PUT')}}
            {{form::submit('Submit',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
