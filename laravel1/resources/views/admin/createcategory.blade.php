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
                
                <form  method="post" action="{{route('admin.category')}} ">
                        @csrf
                        
   {{--                 {{ Form::label('newstitle', 'название новости') }}
                        {{ Form::text('title', 'заголовок',[
                        'class'=>'form-control',
                        'id'=> 'newstitle'
                        ])}} --}}    
                        <div class="form-group">
                            <label for="name" >Название категории для url</label>
                            @if ($errors->has('name'))
                                  <div class="alert alert-danger" role="alert">
                                      @foreach ($errors->get('name') as $error)
                                          {{$error}}
                                      @endforeach
                                  </div>
                            @endif

                            <input id="name" type="text" class="form-control" name="name" value="{{ old( 'name' ) }}">
                        </div>
                       
                       
                        
                        <div class="form-group">
                            <label for="category" >Название категории</label>
                            @if ($errors->has('category'))
                                  <div class="alert alert-danger" role="alert">
                                      @foreach ($errors->get('category') as $error)
                                          {{$error}}
                                      @endforeach
                                  </div>
                            @endif

                            <input id="category" type="text" class="form-control" name="category" value="{{ old( 'category' ) }}">
                        </div>
                       
                      
                        <a href="{{route('admin.category')}}">  <button type="submit" class="form-control">
                              {{__('добавить')}}
                            </button></a>
                           </div>
                    </form>

</div></div></div></div></div>
@endsection


