{{-- Default --}}
@if(strtolower(Main::getRoleIDSession()) === 'superadmin')
    <div class="menu-item">
        <div class="menu-content pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Superadmin Menu</span>
        </div>
    </div>
    <div class="menu-item">
        <a class="menu-link" href="{{ route('v2.admin.menu-list.index', ['special' => Main::encodeId("superadmin"), 'id-page' => Main::encodeId("0")]) }}">
            <span class="menu-icon">
                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"/>
                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"/>
                </svg></span>
            </span>
            <span class="menu-title">Manajemen Menu</span>
        </a>
    </div>

    <div class="menu-item">
        <a class="menu-link " href="{{ route('v2.admin.role-data.index', ['special' => Main::encodeId("superadmin"), 'id-page' => Main::encodeId("0")]) }}">
            <span class="menu-icon">
                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black"/>
                <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black"/>
                <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black"/>
                <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black"/>
                </svg></span>
            </span>
            <span class="menu-title">Manajemen Role-Menu</span>
        </a>
    </div>
    @endif
    <div class="menu-item">
        <div class="menu-content pt-8 pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Pages</span>
        </div>
    </div>

    <div class="menu-item">
        <a class="menu-link " href="{{ route('v2.admin.dashboard.index', ['special' => Main::encodeId("all"), 'id-page' => Main::encodeId("0")]) }}">
            <span class="menu-icon">
                <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
                    </g>
                </svg></span>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </div>
{{-- End Default --}}

{{-- Dynamic Route based on Role --}}
@if(strtolower(Main::getRoleSession()) === 'superadmin')
    @foreach (Main::getMenuList() as $key => $value)
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            @if(count($value->data) === 0)
            <a href="{{ url("{$value->menu_url}?id-page=".Main::encodeId($value->id)) }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        {!! $value->menu_icon !!}
                    </span>
                    <span class="menu-title">{{ $value->menu_title }}</span>
                    @if(count($value->data) > 0)
                    <span class="menu-arrow"></span>
                    @endif
                </span>
            </a>
            @elseif(count($value->data) > 0)
            <span class="menu-link">
                <span class="menu-icon">
                    {!! $value->menu_icon !!}
                </span>
                <span class="menu-title">{{ $value->menu_title }}</span>
                @if(count($value->data) > 0)
                <span class="menu-arrow"></span>
                @endif
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="234">
                @foreach ($value->data as $subKey => $subValue)    
                <div class="menu-item">
                    @if($subValue->menu_visible === 1)
                    <a class="menu-link" href="{{  url("{$subValue->menu_url}?id-page=".Main::encodeId($subValue->id)) }}">
                    @else
                    <span class="menu-link">
                    @endif
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ $subValue->menu_title }}</span>
                    @if($subValue->menu_visible === 1)
                    </a>
                    @else
                    </span>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
    @endforeach
@else
    @foreach (Main::getMenuList() as $key => $value)
    {{-- {{ dd($value) }} --}}
        @if($value->check )
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                @if(count($value->data) === 0)
                <a href="{{ url("{$value->menu_url}?id-page=".Main::encodeId($value->id)) }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            {!! $value->menu_icon !!}
                        </span>
                        <span class="menu-title">{{ $value->menu_title }}</span>
                        @if(count($value->data) > 0)
                        <span class="menu-arrow"></span>
                        @endif
                    </span>
                </a>
                @elseif(count($value->data) > 0)
                <span class="menu-link">
                    <span class="menu-icon">
                        {!! $value->menu_icon !!}
                    </span>
                    <span class="menu-title">{{ $value->menu_title }}</span>
                    @if(count($value->data) > 0)
                    <span class="menu-arrow"></span>
                    @endif
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="234">
                    {{-- {{ dd($value) }} --}}
                    @foreach ($value->data as $subKey => $subValue)    
                    <div class="menu-item">
                        @if($subValue->menu_visible === 1)
                        <a class="menu-link" href="{{  url("{$subValue->menu_url}?id-page=".Main::encodeId($subValue->id)) }}">
                        @else
                        <span class="menu-link">
                        @endif
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">{{ $subValue->menu_title }}</span>
                        @if($subValue->menu_visible === 1)
                        </a>
                        @else
                        </span>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        @endif
    @endforeach
@endif
{{-- End --}}