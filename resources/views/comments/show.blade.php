@extends('layouts.app')

@section('content')
<div class="row card w-100 mb-2 m-auto">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{__('File Details')}}</h2>
        </div>
        <div class="pull-right mt-2 mb-2">
            <a class="btn btn-success" href="{{ route('files.index') }}"> {{__('My Files')}}</a>
        </div>
    </div>
</div>

@endsection
