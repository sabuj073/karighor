@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
    @include('frontend.banner')
    @include('frontend.category')
    @include('frontend.feature')

@endsection

