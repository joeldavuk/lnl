@extends('layouts.main')

@section('content')

{{!! print_r($item); !!}}
main item view, item title: {{ $item->title }}


<!-- categories -->
@foreach ($item->categoryChildren as $itemRelation)
@foreach ($itemRelation->categoryData as $itemCategory)
<p>Category {{ $itemCategory->title }}</p>
<p>Category {{ $itemCategory->slug }}</p>
<p>Category {{ $itemCategory->id }}</p>
@endforeach
@endforeach

<!-- items -->
@foreach ($item->categoryChildren as $itemRelation)
@foreach ($itemRelation->categoryData as $itemCategory)
@foreach ($itemCategory->itemData as $itemData)

@foreach ($itemData->items as $item)
<p>Category {{!! print_r($item->id); !!}}</p>
@endforeach
@endforeach
@endforeach
@endforeach





@stop
