@extends('layouts.main')
@section('title','одна новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-body">
@if (!$news->isprivate || Auth::check())
<h2>{{$news->title}}</h2>

<div class="card-img" style="background-image: url({{ $news->image ?? asset('storage/default.jpg')}})"></div>
<p>{!! $news->text!!}</p>
@else
новость приватная ,пожалуйста авторизируйтесь
@endif
</div></div></div></div></div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
    CKEDITOR.replace('textEdit', options);
    </script>
@endsection