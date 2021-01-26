<li class ="nav-item {{ request()->routeIs('home')?'active':''}}"><a class ="nav-link" href="{{route('home')}}">Главная</a></li>

<li class ="nav-item {{ request()->routeIs('admin.news.index')?'active':''}}"><a class ="nav-link" href="{{route('admin.news.index')}}">admin</a></li>



<li class ="nav-item {{ request()->routeIs('news.category.index')?'active':''}}"><a class ="nav-link" href="{{route('news.category.index')}}">категории</a></li>
<li class ="nav-item {{ request()->routeIs('news.index')?'active':''}}"><a class ="nav-link"  href="{{route('news.index')}}">news</a></li>
<li class ="nav-item {{ request()->routeIs('vue')?'active':''}}"><a class ="nav-link"  href="{{route('vue')}}">vue</a></li>





