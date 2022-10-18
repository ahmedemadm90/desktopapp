@extends('layouts.app')

@section('content')
    <div class="row card w-100 mb-2 m-auto">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Files Management') }}</h2>
            </div>
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('files.index') }}"> {{ __('My Files') }}</a>
            </div>
        </div>
    </div>
    @include('layouts.errors')
    <div class="card w-100">
        <div>
            <H1 class="text-center">{{ __('Add New Comment') }}</H1>
            <hr>
            <form action="{{ route('comments.store', $id) }}" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
                @csrf
                <div class="form-floating">
                    <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
                <div class="text-center mt-2 mb-2">
                    <button class="btn btn-success">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
