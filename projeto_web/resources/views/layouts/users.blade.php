<!DOCTYPE html>
<html>
<head>
	{!! Html::style('bower_components/bootswatch-dist/css/bootstrap.css') !!}
	{!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
	{!! Html::style('css/sidebar.css') !!}
	{!! Html::style('css/my_style.css') !!}

	<title>{{isset($titulo) ? $titulo : ""}}</title>
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=""><i class="fa fa-home"></i></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
        <li><a href="{{ route('log-out') }}">Log out</a></li>
      </ul>
    </div>
  </div>
</nav>

	<div class="container">
		<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
				{{ Html::image('img/user.jpg', '', ['class' => 'img-responsive']) }}
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Marcus Doe
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="{{ route('users.reunioes.index') }}">
							<i class="glyphicon glyphicon-user"></i>
							Minhas reuniões </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="">
							<i class="fa fa-gear"></i>
							Configurações </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                      		<div class="col-md-6">
	                  	  	  <h4><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;{{isset($titulo) ? $titulo : ""}}</h4>
                      			
                      		</div>
                      		<div class="col-md-6">
                      			@if(isset($botao))
	                  	  	  		<a class="btn btn-primary pull-right" href="{{ route($botao['rota'], isset($botao['params']) ? $botao['params'] : []) }}"> {{ $botao['nome'] }}</a>
	                  	  	  	@endif
                      		</div>
	               	  	  <hr>
                              @yield('content')
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
            </div>
		</div>
	</div>
	</div>

	{!! Html::script('bower_components/jquery/jquery.js') !!}
	{!! Html::script('bower_components/bootswatch-dist/js/bootstrap.js') !!}
</body>
</html>