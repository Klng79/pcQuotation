@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class="card">
        <div class="card-header">Create Part
            <a href="/part" class="btn btn-dark float-right"><i class="fa fa-backspace"></i> </a>
        </div>
        <div class="card-body">
            {!! Form::open(['action' => 'PartController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Name')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Part Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('title', 'Group')}}
                    {{Form::select('group', [$grouplist->pluck('name', 'id')], '', ['placeholder' => 'Select Part Group', 'class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{form::label('title', 'Price')}}
                    {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Enter Price'])}}
                </div>
            {{form::submit('Submit',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
