<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-logo d-flex flex-column align-items-center">
                <a href="/" class="shown">EMPLOYEE</a>
                <a href="/" class="hidden">E</a>
            </div>
            @if( isset($menu) )
                <div class="main-menu">
                    <ul>
                        @foreach($menu as $item)
                            <li>
                                <a href="{{ $item['url'] }}" {{ $item['class'] }}>
                                    <i class="{{ $item['icon'] }}"></i>
                                    <span>{{ $item['title'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>