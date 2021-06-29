<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
        @php
            $segments=[];
            $l=count(Request::segments())-1;
            $link='';
        @endphp

        @switch(Request::segments()[$l])
            @case('edit')
                @php
                    $segments=Request::segments();
                    unset($segments[$l--]);
                @endphp
            @break
            @default
                @php $segments=Request::segments() @endphp
        @endswitch

        @foreach($segments as $sg)
           @php $link.='/'.$sg @endphp
           @if($loop->index<$l)

              <li class="breadcrumb-item">
                 <a href="{{$link}}">{{ucfirst($sg=='admin'?'home':$sg)}}</a>
              </li>
           @else
              <li class="breadcrumb-item active" aria-current="page">
                 {{ucfirst($sg)}}
              </li>
           @endif
        @endforeach
        </ol>
    </div>
</nav>
