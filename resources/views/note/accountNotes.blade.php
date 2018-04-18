<section id="customer_notes" class="pt-3">
    <div class="container">
        <div class="row">
            <div id="accordion" class="w-100">
                @foreach($notes as $note)
                    <div class="card">
                        <div class="card-header" id="heading{{$note->id}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse"
                                        data-target="#collapse{{$note->id}}" aria-expanded="true"
                                        aria-controls="collapse{{$note->id}}">
                                    {{$note->created_at}} - {{$note->user->name}}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{$note->id}}" class="collapse" aria-labelledby="heading{{$note->id}}"
                             data-parent="#accordion">
                            <div class="card-body">
                                {{$note->body}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>