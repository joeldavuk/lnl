@extends('layouts.main')

@section('content')

{{!! print_r($item); !!}}
main item view, item title: {{ $item->title }}


@foreach ($item->categoryRelations as $itemRelation)
@foreach ($itemRelation->categoryData as $itemCategory)
<p>Categories {{!! print_r($itemCategory->title) !!}}</p>
@endforeach
@endforeach





@stop
