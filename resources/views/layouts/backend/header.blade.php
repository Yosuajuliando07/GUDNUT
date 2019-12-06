<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars" style="display: block;"></a>
                <a class="navbar-brand" href="index.html">Gudang Nutrisi</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::user()->role->id == 2)
                    <li class="pull-right"><a href="{{route('home')}}" class="js-right-sidebar btn-block btn-sm waves-effect" data-close="true" data-toggle="tooltip" data-placement="left" title="HOMEPAGE" data-original-title="Tooltip on left"><i class="material-icons">forward</i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


