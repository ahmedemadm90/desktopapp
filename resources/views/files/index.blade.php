@extends('layouts.app')

@section('content')
    <div class="row card w-100 mb-2 m-auto">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Files Management</h2>
            </div>
            <div class="pull-right mt-2 mb-2">
                <a class="btn btn-success" href="{{ route('files.create') }}"> {{ __('Upload New File') }}</a>
            </div>
        </div>
    </div>
    @include('layouts.sessions')
    <div class="w-100 card p-2">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="voices-tab" data-bs-toggle="tab" data-bs-target="#voices" type="button"
                    role="tab" aria-controls="voices" aria-selected="true">{{ __('Voices') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button"
                    role="tab" aria-controls="videos" aria-selected="false">{{ __('Videos') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="voices" role="tabpanel" aria-labelledby="voices-tab">
                <table class="table text-capitalize text-center">
                    <tr class="">
                        <th>{{ _('File Name') }}</th>
                        <th>{{ _('File Type') }}</th>
                        <th>{{ _('Comments') }}</th>
                        <th>{{ _('Download') }}</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($voices as $file)
                        <tr>
                            <td>{{ $file->file_memo }}</td>
                            <td>
                                @if ($file->file_type == 'video')
                                    <span class="badge bg-success">{{ $file->file_type }}</span>
                                @else
                                    <span class="badge bg-info">{{ $file->file_type }}</span>
                                @endif
                            </td>
                            <td>{{ $file->comments->count() }}</td>
                            <td><a href="{{ route('download', $file->id) }}" class="btn btn-info">{{ __('download') }}</a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-gear"></i>

                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('files.show', $file->id) }}">{{ __('Show') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('comments.create', $file->id) }}">{{ __('Comment') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                <table class="table text-capitalize text-center">
                    <tr class="">
                        <th>{{ _('File Name') }}</th>
                        <th>{{ _('File Type') }}</th>
                        <th>{{ _('Comments') }}</th>
                        <th>{{ _('Download') }}</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($videos as $file)
                        <tr>
                            <td>{{ $file->file_memo }}</td>
                            <td>
                                @if ($file->file_type == 'video')
                                    <span class="badge bg-success">{{ $file->file_type }}</span>
                                @else
                                    <span class="badge bg-info">{{ $file->file_type }}</span>
                                @endif
                            </td>
                            <td>{{ $file->comments->count() }}</td>
                            <td><a href="{{ route('download', $file->id) }}" class="btn btn-info">{{ __('download') }}</a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('files.show', $file->id) }}">{{ __('Show') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('comments.create', $file->id) }}">{{ __('Comment') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
