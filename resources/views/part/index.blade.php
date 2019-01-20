@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class="card">
        <div class="card-header">Parts List 
            <div class="float-right">
                <a href="part/create" class="btn btn-primary"><i class="fa fa-file"></i> New Part</a>
            </div>
        </div>
        <div class="card-body row">
            <table class="table table-striped">
                <thead>
                        <tr>
                           <th colspan="5">
                            {!! Form::open(['action' => ['PartController@search', ''], 'method' => 'GET', 'class' => 'text-left form-group']) !!}
                                {{Form::label('title', 'Search :')}}
                                {{Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Search Parts'])}}
                                {{form::submit('Submit',['class' => 'btn btn-primary btn-block'])}}</th>
                            {!! Form::close() !!}
                            
                            </th>
                            {{-- <th>{{Form::button('<i class="fa fa-search"></i> Search', ['class' => 'btn btn-primary btn-block ', 'type' => 'Submit'])}}</th> --}}
                        </tr>
                        
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Group</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col"></th>
                        </tr>
                        @if(count($mypart) > 0)
                            @foreach ($mypart as $part)
                        <tr>
                            <td>{{$part->id}}</td>
                            <td>{{$part->name}}</td>
                            <td>{{$part->group_name}}</td>
                            <td class="text-right">{{number_format($part->price,2)}}</td>
                            <td width="280" class="text-right">
                                <a href="/part/{{$part->id}}/edit" class="btn btn-warning">    <i class="fa fa-edit"></i> Edit</a>
                                {!! Form::open(['action' => ['PartController@destroy', $part->id], 'method' => 'POST', 'class'=> 'float-right', 'onsubmit' => 'return confirm("Do you really want to delete this group?")']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::button('<i class="fa fa-trash"></i> Delete',['Class' => 'btn btn-danger', 'type' => 'Submit'])}}
                                {!! Form::close() !!}
                        </tr>
                            @endforeach
                        @endif
                    </thead>
            </table>
            
                    
        </div>
        <div class="card-footer">
            @if(count($mypart) > 0)
                {{$mypart->links()}}
            @endif
        </div>
    </div>
</div>
@endsection
