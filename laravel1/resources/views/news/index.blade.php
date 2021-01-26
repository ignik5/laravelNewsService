@extends('layouts.main')
@section('title','новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
<p>новости</p>

<div>
@forelse($news as $item)
<h2>{{$item->title}} </h2>
<div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpg')}})"></div>
@if(!$item->isprivate || Auth::check())
<a href="{{ route('news.show', $item) }}">подробнее..</a><br>
@endif<hr>
@empty
нет новостей
@endforelse
{{$news->links()}}
</div></div></div></div></div></div>
@endsection