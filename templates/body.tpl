<body>
	<div class="contenedor">
		<div class="pattern">
			<nav class="navbar navbar-default nav">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img alt="ATIvsNVIDIA" src="img/lg3.png"></a>

					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav fuentenav">
							<li><a href="">Inicio <span class="sr-only">(current)</span></a></li>
							<li><a class="link-ajax" href="atiboostrap">Historia ATI</a></li>
							<li><a class="link-ajax" href="nvidiaboostrap">Historia NVIDIA</a></li>
							<li><a class="link-ajax" href="comparativaNormal">Comparativa</a></li>
							<li><a href="#contacto">Contacto</a></li>
							  {if $usuario}
            					<li><a class="link-ajax" href="logout">Log Out</a>{$usuario}</li>
            				{else}
            					<li><a class="link-ajax" href="login">Log In</a></li>
            				{/if}
							
							
						</ul>



					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<div class="reemplazo" id="reemplazo" name="home">
				<div class="container">

					<div class="row ">
						<div class="col-xs-12 col-sm-12 col-md-12 cont">
							<p>
								Tarjetas gráficas gamers
							</p>
						</div>
					</div>
					<div class="row  ">
						<div class="col-xs-12 col-sm-12 col-md-12 conthome2">
							<p>
								El mercado actual ofrece una gran variedad de modelos y de marcas de ambos tipos de GPU tanto de AMD como NVidia.
							</p>
						</div>
					</div>
				</div>
			</div>