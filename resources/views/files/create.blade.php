@extends('layouts.app')

@section('content')
    <div class="row card w-100 mb-2 m-auto">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('Files Management')}}</h2>
            </div>
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('files.index') }}"> {{ __('My Files') }}</a>
            </div>
        </div>
    </div>
    @include('layouts.errors')
    <div class="card w-100">
        {{-- {!! Form::open(array('route' => 'files.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!} --}}
        <div>
            <H1 class="text-center">{{ __('Upload New File') }}</H1>
            <hr>
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
                @csrf
                <div class="row m-2">
                    <div class="col-md">
                        <label for="memo">{{ __('File Memo') }}</label>
                        <input id="memo" class="form-control" type="text" name="file_memo" placeholder="File Memo">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-md">
                        <label for="type">{{ __('File Type') }}</label>
                        <select name="file_type" id="type" class="form-control">
                            <option value="" class="" disabled hidden selected>{{ __('File Type') }}</option>
                            <option value="video" class="">{{ __('Video') }}</option>
                            <option value="voice" class="">{{ __('Voice') }}</option>
                        </select>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">{{__('File')}}</label>
                        <input class="form-control" name="file" type="file" id="formFile">
                    </div>
                </div>
                <div class="text-center mb-2">
                    <button class="btn btn-success">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
