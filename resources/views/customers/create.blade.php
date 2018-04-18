@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card card-default">
                    <div class="card-header">Create a new Customer</div>

                    <div class="card-body">
                        <form method="POST" action="/customers/add">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="name" >Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" name="phone" class="form-control" id="phone" required>{{old('phone')}}</input>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" id="email" required>{{old('email')}}</input>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Add Customer</button>
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
