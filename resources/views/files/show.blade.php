@extends('layouts.app')

@section('content')
    <div class="row card w-100 mb-2 m-auto">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('File Details') }}</h2>
            </div>
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('files.index') }}"> {{ __('My Files') }}</a>
            </div>
        </div>
    </div>
    <div class="w-100 card">
        @if ($file->file_type == 'video')
            <video width="350" height="350" controls class="m-auto">
                <source src="{{ asset('media/videos/' . $file->file_name) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <hr>
            <h1 class="text-center">Comments</h1>
            @foreach ($file->comments as $comment)
                <div class="card w-75 m-auto mb-2">
                    <div class="card-body">
                        <p>{{ $comment->comment }}</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <a class="btn btn-info"
                                    href="{{ route('comments.edit', $comment->id) }}">{{ __('Edit Comment') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <audio controls>
                <source src="{{ asset('media/voices/' . $file->file_name) }}" type="audio/mpeg">
            </audio>
            <hr>
            <h1 class="text-center">Comments</h1>
            @foreach ($file->comments as $comment)
                <div class="card w-75 m-auto mb-2">
                    <div class="card-body">
                        <p>{{ $comment->comment }}</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <a class="btn btn-info"
                                    href="{{ route('comments.edit', $comment->id) }}">{{ __('Edit Comment') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
