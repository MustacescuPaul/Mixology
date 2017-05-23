@if(Auth::check())

<!-- Navbar -->
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="{{route('home')}}">Acasa</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mixology
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('all_recipes')}} ">Retete</a></li>
          <li><a href="{{route('recipes.create')}} ">Creeaza Reteta</a></li>
          <li><a href="{{route('recipes.index')}} ">Retetele mele</a></li>
          <li><a href="#">Creditul meu</a></li>
          <li><a href="#">Contul meu</a></li>
          <li><a href="{{route('pages.searchRecipe')}} ">Cautare</a></li>
        </ul>
      </li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Topuri
        <span class="caret"></span></a>
        <ul class="dropdown-menu ">
          <li>{!! Html::linkRoute('pages.top','Top Zilnic',['daily_amount'],['class'=>'btn']) !!}</li>
          <li>{!! Html::linkRoute('pages.top','Top Saptamanal',['weekly_amount'],['class'=>'btn']) !!}</li>
          <li>{!! Html::linkRoute('pages.top','Top Lunar',['monthly_amount'],['class'=>'btn']) !!}</li>
          <li>{!! Html::linkRoute('pages.top','Top General',['total_amount'],['class'=>'btn']) !!}</li>
        </ul>
      </li>
      <li><a href="#">Info</a></li>
    </ul>

@else
<!-- Navbar -->
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="#">Acasa</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mixology
        <span class="caret"></span></a>
        <ul class="dropdown-menu ">
          <li><a href="{{route('all_recipes')}} ">Retete</a></li>
          <li><a href="{{route('pages.searchRecipe')}} ">Cautare</a></li>
        </ul>
      </li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Topuri
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li>{!! Html::linkRoute('pages.top','Top Zilnic',['daily_amount'],['class'=>'btn']) !!}</li>
          <li>{!! Html::linkRoute('pages.top','Top Saptamanal',['weekly_amount'],['class'=>'btn']) !!}</li>
          <li>{!! Html::linkRoute('pages.top','Top Lunar',['monthly_amount'],['class'=>'btn']) !!}</li>
          <li>{!! Html::linkRoute('pages.top','Top General',['total_amount'],['class'=>'btn']) !!}</li>
        </ul>
      </li>
      <li><a href="#">Info</a></li>
    </ul>
@endif

    
<!-- Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">           
                        
                        <li>{!!Form::open(['route'=>'logout','method' => 'POST'])!!}
                            {!! Form::submit('Logout', ['class' => 'btn btn-link pull-right','route'=>'logout']) !!}
                            {!! Form::close()!!}</li> 
                    </ul>
                </li>
                @else
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('login')}} ">Autentificare</a></li>
                       
                        <li><a href="{{route('register')}} ">Inregistrare</a></li>                
                    </ul>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>