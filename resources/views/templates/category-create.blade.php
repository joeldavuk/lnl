@extends('layouts.main')

@section('content')

<h2>{{ $category->title }}</h2>

{!! Form::open(['route' => ['category_store']) !!}

{!! Form::text('title', null, ['class' => 'form-control']) !!}

{!! Form::submit('Add Category') !!}

{!! Form::close() !!}

@stop
