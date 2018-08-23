@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="text" name="email" id="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control {{ $errors->has('first_name') ? 'border-danger' : '' }}" value="{{ Request::old('first_name') }}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-6">
                <h3>Sign In</h3>
                <form action="{{ route('signin') }}" method="post">
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="text" name="email" id="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" value="{{ Request::old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Your Password</label>
                        <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
    </div>
@endsection
