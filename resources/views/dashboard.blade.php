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
            <article class="post">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <div class="info">
                    Posted by Hoang on 23 Aug 2018
                </div>
                <div class="interaction">
                    <a href="#">Like</a> | 
                    <a href="#">Dislike</a> | 
                    <a href="#">Edit</a> | 
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <div class="info">
                    Posted by Hoang on 23 Aug 2018
                </div>
                <div class="interaction">
                    <a href="#">Like</a> | 
                    <a href="#">Dislike</a> | 
                    <a href="#">Edit</a> | 
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
@endsection