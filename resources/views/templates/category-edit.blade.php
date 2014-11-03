@extends('layouts.main')

@section('content')

    <h2>{{ $category->title }}</h2>

        {!! Form::model($category, ['route' => ['category_update', $category->slug], 'method' => 'PATCH']) !!}

        {!! Form::text('title', null, ['class' => 'form-control']) !!}

        {!! Form::submit('Update') !!}

        {!! Form::close() !!}

@stop
