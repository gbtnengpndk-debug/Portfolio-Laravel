@extends('layouts.portfolio')

@section('title', 'Portfolio | Andhika')

@section('content')

    @include('components.hero')
    @include('components.about')
    @include('components.skills')
    @include('components.projects')
    @include('components.contact')

@endsection