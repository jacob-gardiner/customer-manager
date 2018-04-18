<section id="add_note">
    <div>
        <form method="POST" action="/note/store/{{$customer->id}}">
            {{csrf_field()}}

            <div class="form-group">
                <label for="note_body">Note:</label>
                            <textarea type="text" class="form-control" id="note_body" name="note_body"
                          value="{{ old('note_body') }}" rows="9" m="9" style=" min-height : 13.7rem;" required>
                                </textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success"><i class="fas fa-plus"></i> Add Note</button>
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
</section>