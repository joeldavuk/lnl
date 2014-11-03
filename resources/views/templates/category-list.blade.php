@extends('layouts.main')

@section('content')

    @foreach($categories as $category)

        <li>
            {!! link_to_route('category_path',$category->title, [$category->slug]) !!}
        </li>

    @endforeach

@stop
