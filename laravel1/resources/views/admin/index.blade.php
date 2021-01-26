@extends('layouts.main')
@section('title',' админка')

@section('menu')
    @include('admin.menu')
@endsection
</ul></nav>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
                
<p>adminka </p>


<div>
    @forelse($news as $item)
    <h2>{{$item->title}} </h2>
  
    <form action="{{route('admin.news.destroy',$item)}}" method="post">
    <a href="{{ route('admin.news.edit', $item) }}"><button type="button" class="bth btn-success">edit</button></a>
  
  

     <button type="submit" class="bth btn-danger">delite</button>
@csrf
@method('DELETE')
  </form>

   <A href="{{ route('news.show', $item) }}">подробнее...</A>

  <hr>
    @empty
    нет новостей
    @endforelse
    {{$news->links()}}
    </div>
    </div></div></div></div>
@endsection