<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        @foreach($productMenu as $p)
            @if($p->childs->isNotEmpty())
                <li><a>{{$p->title}}</a>
                @foreach ($p->childs as $sub)
                    
                        <ul class="sub-menu">
                            <li><a href="{{ url('/') }}/products/{{$sub->id}}/{{canonicalise($sub->title)}}">{{$sub->title}}</a></li>                           
                        </ul>
                    </li>
                @endforeach
            @else
                <li><a href="{{ url('/') }}/products/{{$p->id}}/{{canonicalise($p->title)}}">{{ $p->title }}</a></li>
            @endif
        @endforeach       
    </ul>
</div>