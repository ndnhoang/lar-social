@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-6 col-md-offset-3">
            <h3>What do you have to say?</h3>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea name="body" id="body" rows="5" placeholder="Your Post" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-6">
            <h3>What other people say...</h3>
            @foreach ($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                    <p class="post-body">{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> | 
                        <a href="#">Dislike</a>
                        @if (Auth::user() == $post->user)
                            | 
                            <a href="#" class="edit">Edit</a> | 
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <div class="modal" tabindex="-1" role="dialog" id="edit_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="post_body">Edit the Post</label>
                            <textarea name="post_body" id="post_body" rows="5" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal_save">Save changes</button>
                </div>
                </div>
        </div>
    </div>
    <script>
        var token = '{{ Session::token() }}';
        var url = "{{ route('edit') }}";
    </script>
@endsection