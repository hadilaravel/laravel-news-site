<header id="header">
    <nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
{{--                <a class="navbar-brand" href="#"><img src="pics/logo.png"></a>--}}
            </div>
            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home.index') }}">صفحه نخست</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Profile Picture -->
    <img id="profilePic" src="{{ auth()->user()->profileImage() }}">
    <div class="container-fluid" id="subheader">
        <div class="row" id="row">
            <div class="col-md-12">
                <h1 id="name">{{ auth()->user()->name }}</h1>
            </div>
        </div>
    </div>
</header>
