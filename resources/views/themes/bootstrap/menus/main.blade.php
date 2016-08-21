<ul class="{{ $class }}">
    @foreach ($items as $item)
        <li @if ($item['class']) class="{{ $item['class'] }}" @endif id="menu_{{ $item['id'] }}">
            <a href="{{ $item['url'] }}">
                @if(array_key_exists('img', $item))  
                    @if($item['img'] == 'user')
                        <img src="{{ auth()->user()->photo }}" style="max-width: 45px;" /> 
                    @else
                        <img src="{{ $item['img'] }}"/> 
                    @endif
                @endif
                @if(array_key_exists('i', $item))  <i class="{{ $item['i'] }}"></i> @endif
                {{ $item['title'] }}
            </a>
            @if (array_key_exists('include', $item))
                @include($item['include'])
            @endif
            @if (! empty($item['submenu']))
                <ul class="sub_menu">
                    @foreach ($item['submenu'] as $subitem)
                        <li>
                            <a href="{{ $subitem['url'] }}">{{ $subitem['title'] }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>