@extends('layouts.app')

@section('content')
    <section id="root">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">My Customer's</div>
                        <div class="card-body">

                            @foreach($customers as $customer)
                                <article class="d-flex flex-row">

                                    <div class="mr-auto">
                                        <h4>
                                            <a href="customers/show/{{$customer->id}}">{{$customer->name}}</a>
                                        </h4>
                                        {{$customer->email}}
                                    </div>

                                    {{--<div class="align-self-center pr-2">--}}
                                        {{--<form method="GET" action="/send-email/{{$customer->id}}">--}}
                                            {{--<button class="btn btn-secondary grow" data-toggle="tooltip" data-placement="top" title="Send Invitation"><i class="fas fa-envelope"></i></button>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}

                                    <div class="align-self-center pr-2">
                                        <form action="customers/show/{{$customer->id}}">
                                            <button data-toggle="tooltip" data-placement="top" title="View" class="btn btn-dark grow">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="align-self-center pr-2">
                                        <form action="customers/edit/{{$customer->id}}">
                                            <button data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info grow">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="align-self-center">
                                        <form method="GET" action="/customers/delete/{{$customer->id}}">
                                            <button data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger grow"><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </article>
                                <hr>
                            @endforeach

                            <form action="/customers/create" method="GET">
                                <button class="btn btn-success"><i class="fas fa-plus"></i> Add Customer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="emailModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Send Email</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Are you sure you would like to delete this customer?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <form method="GET" action="/send-email">
                            {{csrf_field()}}

                            <button class="btn btn-success" type="submit">Send</button>
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')

    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Delete</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        Are you sure you would like to delete this customer?
    </div>


    <!-- Modal footer -->
    <div class="modal-footer">
        <form method="GET" action="/customers/delete/21">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
    </div>
@endsection




