@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card panel-default">
            <div class="card-header">{{$customer->name}}</div>
            <div class="card-body">
                <div class="row d-flex">
                    <div class="col-sm flex-1 ">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{$customer->name}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                   value="{{$customer->phone}}" disabled/>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" class="form-control" id="email"
                                   value="{{$customer->email}}" disabled/>
                        </div>

                        <form method="GET" action="/customers/edit/{{$customer->id}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <button class="btn btn-primary">Edit Customer</button>
                            </div>

                            @if(count($errors))
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                    </div>
                    <div class="col-sm flex-1 ">
                        @include('note.create')
                    </div>
                </div>
            </div>
        </div>

        @include('note.accountNotes')
    </div>
@endsection

