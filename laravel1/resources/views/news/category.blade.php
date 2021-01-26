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
<p>новости</p>

<div>
@forelse($news as $item)
<h2>{{$item['title']}} </h2>
@if((!$item['isprivate'])|| (Auth::check()))

<a href="{{ route('news.show', $item['id']) }}">подробнее..</a><br>
@endif<hr>
@empty
нет новостей
@endforelse

</div></div></div></div></div></div>
@endsection