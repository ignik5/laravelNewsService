@extends('layouts.main')
@section('title','создание новости')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                
                <form  enctype="multipart/form-data" method="POST" action="@if(!$news->id)
                    {{ route('admin.news.store') }} @else{{route('admin.news.update',$news)}} @endif">
                        @csrf
                        @if($news->id) @method('PATCH') @endif
   {{--                 {{ Form::label('newstitle', 'название новости') }}
                        {{ Form::text('title', 'заголовок',[
                        'class'=>'form-control',
                        'id'=> 'newstitle'
                        ])}} --}}    
                        <div class="form-group">
                            <label for="newstitle" >Название новости</label>
                            @if ($errors->has('title'))
                                  <div class="alert alert-danger" role="alert">
                                      @foreach ($errors->get('title') as $error)
                                          {{$error}}
                                      @endforeach
                                  </div>
                            @endif

                            <input id="newstitle" type="text" class="form-control" name="title" value="{{ old( 'title' ) ?? $news->title  }}">
                        </div>
                         <div class="form-group">
                            <label for="newscategory">Категория новости</label>
                            @if ($errors->has('category_id'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('category_id') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                      @endif
                            <select id="newscategory" class="form-control" name="category_id">
                            @forelse($categories as $item)
                            <option @if ($item['id'] == old( 'category' ) ) selected @endif value="{{ $item['id'] }}">{{ $item['category']}}</option>
                            @empty
                            <h2>Нет категории</h2>
                            @endforelse
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="newstext" >Текст новости</label>
                            @if ($errors->has('text'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('text') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                      @endif
                            <textarea name="text" id="textEdit" rows="5" class="form-control"  >{!! empty(old( 'text' )) ? $news->text : old('text') !!}</textarea>
                        </div>
                        @if ($errors->has('image'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('image') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                      @endif
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            @if ($errors->has('category_id'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('isprivate') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                      @endif
                            <input @if($news->isprivate == 1 || old('isprivate') == 1)checked @endif id="isprivate" type="checkbox" class="form-click-input" name="isprivate"  value="1">
                            <label for="newsprivate" class="form-click-input" >новость приватная?</label> 
                            </div>
                        <div class="form-group">
                            <button type="submit" class="form-control">
                                @if($news->id){{__('изменить')}} @else {{__('добавить')}} @endif
                            </button>
                           </div>
                    </form>

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




