@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class="card">
        <div class="card-header">Group List <div class="float-right"><a href="group/create" class="btn btn-primary"><i class="fa fa-file"></i> New Groups</a></div></div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($groups) > 0)
                        @foreach ($groups as $group)
                            <tr class="align-middle">
                                <td width="150">{{$group->id}}</td>
                                <td>{{$group->name}}</td>
                                <td>##</td>
                                <td width="280" class="text-right">
                                    <a href="#" class="btn btn-success"><i class="fa fa-plus-square"></i> Add</a>
                                    <a href="/group/{{$group->id}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit </a>
                                    {!! Form::open(['action' => ['GroupController@destroy', $group->id], 'method' => 'POST', 'class'=> 'float-right', 'onsubmit' => 'return confirm("Do you really want to delete this group?")']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::button('<i class="fa fa-trash"></i> Delete',['Class' => 'btn btn-danger', 'type' => 'Submit'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td  colspan="3">No Data Found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(count($groups) > 0)
                {{$groups->links()}}
            @endif
        </div>
    </div>
</div>
@endsection
