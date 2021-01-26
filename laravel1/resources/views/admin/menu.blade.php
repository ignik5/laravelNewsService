<li class ="nav-item {{ request()->routeIs('home')?'active':''}}"><a class ="nav-link" href="{{route('home')}}">Главная</a></li>

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Добавить <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        
    <a class ="nav-link"  href="{{route('admin.news.create')}}">Добавить новость </a>
          
    <a class ="nav-link"  href="{{route('admin.category')}}">Добавить категорию </a>
 
  

    </div></li>
<li class ="nav-item {{ request()->routeIs('admin.updateuser')?'active':''}}"><a class ="nav-link"  href="{{route('admin.updateuser')}}">пользователи </a></li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       Скачать<span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        
        <a class ="nav-link"  href="{{route('admin.savepicture')}}">Cкачать изображение </a>
          
        <a class ="nav-link"  href="{{route('admin.json1')}}">Cкачать json </a>
  

    </div></li>
    <li >
            <a class ="nav-link"  href="{{route('admin.parser')}}">спарсить новости</a>
      
    
        </li>
 <li class ="nav-item {{ request()->routeIs('clear')?'active':''}}"><a class ="nav-link"  href="{{route('clear')}}">кэш</a></li>
