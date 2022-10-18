@extends('layouts.app')

@section('content')
    <div class="row card w-100 mb-2 m-auto">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Edit My Profile') }}</h2>
            </div>
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('home') }}"> {{ __('Home') }}</a>
            </div>
        </div>
    </div>
    @include('layouts.errors')
    <div class="card w-100">
        <div>
            <H1 class="text-center">{{ __('Update My Profile') }}</H1>
            <hr>
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                class="w-50 m-auto">
                @csrf
                <div class="row m-2">
                    <div class="col-md">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="File Memo"
                            value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="File Memo"
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="text" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md">
                        <label for="confirm-password">{{ __('Confirm Password') }}</label>
                        <input id="confirm-password" class="form-control" type="text" name="confirm-password" placeholder="Password">
                    </div>
                </div>
                <div class="text-center mb-2">
                    <button class="btn btn-success">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
