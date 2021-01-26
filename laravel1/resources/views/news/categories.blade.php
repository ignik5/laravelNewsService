@extends('layouts.main')
@section('title','категории')
 
@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-body">
<p>категории</p>
@forelse ($categories as $category)
<a href="{{route('news.category.show',$category['name'])}}">
    <h2>{{$category['category']}}</h2>
</a>
    @empty
    нет категории
    

</div></div></div></div></div>
    @endforelse
@endsection