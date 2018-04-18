@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card panel-default">
                    <div class="card-header">Edit - {{$customer->name}}</div>

                    <div class="card-body">
                        <form method="POST" action="/customers/update/{{$customer->id}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{$customer->name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                       value="{{$customer->phone}}" required/>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" id="email"
                                       value="{{$customer->email}}" required/>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Update Customer</button>
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
                </div>
            </div>
        </div>

    </div>


@endsection

