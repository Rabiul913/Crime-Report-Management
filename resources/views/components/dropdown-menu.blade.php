@props(['url'=>'', 'title'])  
 <li class="submenu-item ">
    @if($url > 0)
    <a href="{{ $url }}">{{$title}}</a>
    @else
    <a href="#">{{$title}}</a>
    @endif
 </li>