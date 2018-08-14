<style>
	.nav.navbar-nav > li.active a {
        border: 0;
    }
    .nav.navbar-nav li:not(:last-child)  {
    	margin-top: 12px;
    	height: 25px;
        border-right: 1px solid #ccc;
        border-radius: 0;    
    }
	.nav.navbar-nav li a {
		margin-top: -10px;
  		border-radius: 0; /* avoid curved divisor corner */
	}
	.nav.navbar-nav li:last-child a {
		margin-top: 0px;
  		border-radius: 0; /* avoid curved divisor corner */
	}
	
	/* Estilo para PC */
	#logo_menu{
		padding: 0px;
	}
	
	/* Estilo para Mobile */
	@media screen and (max-width: 768px) {
	 	
		#logo_menu{
			position: absolute; 
			left: 0%; 
			padding: 0px;
		}
		
	}
</style>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                            
			<ul class="nav navbar-nav" id="logo_menu">
				<li>
					<a class="pull-left navbar-brand">
						<img style="max-width: 60px; margin: -6px; margin-left: 5px;" src="img/logo.png" />
					</a>
				</li>
			</ul>
			
		</div>
			
		<div class="collapse navbar-collapse">
			
			<ul class="nav navbar-nav navbar-left" id="bs-example-navbar-collapse-1">
				
				<li><a href="home.php">Home</a></li>
				<li><a href="ger_equip.php">Equipamentos</a></li>
				<li><a href="ger_obra.php">Obras</a></li>
				<li><a href="ger_loc.php">Locações</a></li>
				<li><a href="ger_cliente.php">Clientes</a></li>
				
			</ul>
			
			<ul class="nav navbar-nav navbar-right" id="bs-example-navbar-collapse-1">
				<li><a href="php/logoff.php">Sair</a></li>
			</ul>
			
		</div>
		
	</div>
</nav>