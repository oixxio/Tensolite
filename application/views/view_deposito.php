<link href="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
<style type="text/css">
.tab-pane > div.row{	margin-top: 30px;	}
.lugar{
	text-align: center;
	color: white;
	border-radius: 10px;		
	height: 20px; 
	padding-top: 2px!important;
	cursor: pointer;
}
.cuadrilla{
	text-align: center;
	padding-top: 2px!important;
}
.lugar-gris{	background-color: #C2C2C4;	}
.lugar-rojo{	background-color: #BE5073;	}
.lugar-verde{	background-color: #0BABAD;	}
#tab-sector-1 > div > .lugar, #tab-sector-1 > div > .cuadrilla{	margin-left: 2%;	}
#tab-sector-2 > div > .lugar, #tab-sector-2 > div > .cuadrilla{
	margin-left: 1%;	
	width: 8%;	
}
#tab-sector-3 > div > .lugar, #tab-sector-3 > div > .cuadrilla{
	margin-left: 1%;	
	width: 6.6%;	
}
.naval{
	position: absolute;
	width: 10px;
}


.widget-stats .stats-info h5 {
    font-size: 10px;
    margin: 5px 0 0 0;
    color: #fff;
}
.widget-stats .stats-info h4 {
    text-align: center;
    font-weight: bold;
}


</style>
<!-- begin #content -->
<div id="content" class="content">



	<div class="row" id="wid">

		
		<div class="row">
		<?php foreach ($medidas_aster as $key=>$medida): ?>			
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-green">
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_aster[$key]?>u</p>
						<p><?=($cantidades_aster[$key]*$medida)?>m</p>
						<p>%</p>	
						<h5>AS</h5>
					</div>				
				</div>
			</div>
		<?php endforeach; ?>
		</div>

		<div class="row">
		<?php foreach ($medidas_a1 as $key=>$medida): ?>	
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-blue">
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_a1[$key]?>u</p>
						<p><?=($cantidades_a1[$key]*$medida)?>m</p>
						<p>%</p>	
						<h5>A1</h5>
					</div>		
				</div>
			</div>				
		<?php endforeach; ?>

		<?php foreach ($medidas_a2 as $key=>$medida): ?>	
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-purple">
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_a2[$key]?>u</p>
						<p><?=($cantidades_a2[$key]*$medida)?>m</p>
						<p>%</p>	
						<h5>A2</h5>
					</div>		
				</div>
			</div>				
		<?php endforeach; ?>
		</div>

		<div class="row">
		<?php foreach ($medidas_b1 as $key=>$medida): ?>	
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-red">
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_b1[$key]?>u</p>
						<p><?=($cantidades_b1[$key]*$medida)?>m</p>
						<p>%</p>
						<h5>B1</h5>
					</div>		
				</div>
			</div>				
		<?php endforeach; ?>

		<?php foreach ($medidas_b2 as $key=>$medida): ?>	
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-orange">
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_b2[$key]?>u</p>
						<p><?=($cantidades_b2[$key]*$medida)?>m</p>
						<p>%</p>
						<h5>B2</h5>
					</div>		
				</div>
			</div>				
		<?php endforeach; ?>
		</div>
		
		<div class="row">
		<?php foreach ($medidas_c as $key=>$medida): ?>	
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-grey">
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_c[$key]?>u</p>
						<p><?=($cantidades_c[$key]*$medida)?>m</p>
						<p>%</p>
						<h5>C</h5>
					</div>		
				</div>
			</div>				
		<?php endforeach; ?>

		<?php foreach ($medidas_d as $key=>$medida): ?>	
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-aqua">
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_d[$key]?>u</p>
						<p><?=($cantidades_d[$key]*$medida)?>m</p>
						<p>%</p>	
						<h5>D</h5>
					</div>		
				</div>
			</div>				
		<?php endforeach; ?>
		</div>				

		<div class="row">
		<?php foreach ($medidas_e as $key=>$medida): ?>	
			<div class="col-lg-1 col-md-2 col-xs-3 ui-sortable">
				<div class="widget widget-stats bg-black">
					<div class="stats-icon"></div>
					<div class="stats-info">
						<h4><?=$medida?></h4>
						<p><?=$cantidades_e[$key]?>u</p>
						<p><?=($cantidades_e[$key]*$medida)?>m</p>
						<p>%</p>	
						<h5>E</h5>
					</div>		
				</div>
			</div>				
		<?php endforeach; ?>
		</div>				
	</div>

	<!--
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			</div>
			<h4 class="panel-title">Depósito</h4>
		</div>
		<div class="panel-body" style="background:#c1ccd1;">
			<div class="row">
				<div class="col-xs-6 nopadding">
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>AS</h4>
								<p><?=number_format($aster,1)?>%</p>	
								<h4>Cap. total: 15648</h4>	
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>A1</h4>
								<p><?=number_format($a1,1)?>%</p>	
								<h4>Cap. total: 9408</h4>		
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>A2</h4>
								<p><?=number_format($a2,1)?>%</p>	
								<h4>Cap. total: 7056</h4>		
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>B1</h4>
								<p><?=number_format($b1,1)?>%</p>	
								<h4>Cap. total: 7056</h4>		
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 nopadding">
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>B2</h4>
								<p><?=number_format($b2,1)?>%</p>	
								<h4>Cap. total: 5880</h4>		
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>C</h4>
								<p><?=number_format($c,1)?>%</p>	
								<h4>Cap. total: 8232</h4>		
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>D</h4>
								<p><?=number_format($d,1)?>%</p>	
								<h4>Cap. total: 7776</h4>		
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6 ui-sortable">
						<div class="widget widget-stats bg-green">
							<div class="stats-icon"><i class="fa fa-cubes"></i></div>
							<div class="stats-info">
								<h4>E</h4>
								<p><?=number_format($e,1)?>%</p>	
								<h4>Cap. total: 3960</h4>		
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">			    
				<ul class="nav nav-tabs">
					<li class="<?php if($sector==1) echo 'active'; ?>"><a href="#tab-sector-1" data-toggle="tab">Sector 1</a></li>
					<li class="<?php if($sector==2) echo 'active'; ?>"><a href="#tab-sector-2" data-toggle="tab">Sector 2</a></li>
					<li class="<?php if($sector==3) echo 'active'; ?>"><a href="#tab-sector-3" data-toggle="tab">Sector 3</a></li>
				</ul>
				<div class="tab-content">
					<?php 
						foreach ($lugares as $lugar) {

							if($lugar->id_lugar == 1) {
								if($sector==1) echo '<div class="tab-pane fade active in" id="tab-sector-1">';
								else echo '<div class="tab-pane fade" id="tab-sector-1">';
								echo '<h3 class="text-center">Sector 1</h3>';
								echo '<h5 class="text-center">Nave 1</h5>';
								echo '<div class="row">
										<div class="col-xs-2 cuadrilla">1</div>
										<div class="col-xs-2 cuadrilla">2</div>
										<div class="col-xs-2 cuadrilla">3</div>
										<div class="col-xs-2 cuadrilla">4</div>
										<div class="col-xs-2 cuadrilla">5</div>
									  </div>';
								$col = 'col-xs-2';
							}
							elseif($lugar->id_lugar == 41) {
								if($sector==2) echo '</div></div><div class="tab-pane fade active in" id="tab-sector-2">';
								else echo '</div></div><div class="tab-pane fade" id="tab-sector-2">';
								echo '<h3 class="text-center">Sector 2</h3>';
								echo '<h5 class="text-center">Nave 1</h5>';
								echo '<div class="row">
										<div class="col-xs-1 cuadrilla">1</div>
										<div class="col-xs-1 cuadrilla">2</div>
										<div class="col-xs-1 cuadrilla">3</div>
										<div class="col-xs-1 cuadrilla">4</div>
										<div class="col-xs-1 cuadrilla">5</div>
										<div class="col-xs-1 cuadrilla">6</div>
										<div class="col-xs-1 cuadrilla">7</div>
										<div class="col-xs-1 cuadrilla">8</div>
										<div class="col-xs-1 cuadrilla">9</div>
										<div class="col-xs-1 cuadrilla">10</div>
										<div class="col-xs-1 cuadrilla">11</div>
									  </div>';
								$col = 'col-xs-1';
							}
							elseif ($lugar->id_lugar == 129) {
								if($sector==3) echo '</div></div><div class="tab-pane fade active in" id="tab-sector-3">';
								else echo '</div></div><div class="tab-pane fade" id="tab-sector-3">';
								echo '<h3 class="text-center">Sector 3</h3>';
								echo '<h5 class="text-center">Nave 1</h5>';
								echo '<div class="row">
										<div class="col-xs-1 cuadrilla">1</div>
										<div class="col-xs-1 cuadrilla">2</div>
										<div class="col-xs-1 cuadrilla">3</div>
										<div class="col-xs-1 cuadrilla">4</div>
										<div class="col-xs-1 cuadrilla">5</div>
										<div class="col-xs-1 cuadrilla">6</div>
										<div class="col-xs-1 cuadrilla">7</div>
										<div class="col-xs-1 cuadrilla">8</div>
										<div class="col-xs-1 cuadrilla">9</div>
										<div class="col-xs-1 cuadrilla">10</div>
										<div class="col-xs-1 cuadrilla">11</div>
										<div class="col-xs-1 cuadrilla">12</div>
										<div class="col-xs-1 cuadrilla">13</div>
									  </div>';
							}
							if($lugar->columna == 1 && $lugar->fila == 1){
								echo '<div class="row">';
							}
							elseif ($lugar->columna == 1 && $lugar->fila != 1){
								echo '</div><div class="row">';
							}
							if($lugar->paquetes == 0) $lug = 'lugar-gris';
							else{
								if($lugar->cant>=$lugar->cantidad) $lug = 'lugar-verde';
								else $lug = 'lugar-rojo';
							}
							echo '<div class="'.$col.' lugar '.$lug.'" id="'.$lugar->id_lugar.'" max="'.$lugar->cantidad.'" min="'.$lugar->cant.'" title="'.$lugar->cant.'/'.$lugar->cantidad.'">'.number_format(($lugar->medida/10),2).'</div>';
								
						}
						echo '</div>';
					?>
					
				</div>
			</div>
		</div>	
	</div>-->				
</div>
<?php /*
	foreach ($despachos as $despacho) {
		echo '<div class="alert alert-warning fade in m-b-15"><strong>Alerta!</strong> Se han depachado '.$despacho->cantidad.' unidades de '.number_format((($despacho->medida)/10),2).' el día '.date_format(date_create($despacho->fecha),"d/m/Y").'<span class="close" data-dismiss="alert">×</span></div>';
	}
	foreach ($producciones as $produccion) {
		echo '<div class="alert alert-info fade in m-b-15"><strong>Alerta!</strong> Se han prducido '.$produccion->cantidad.' unidades de '.number_format((($produccion->medida)/10),2).' el día '.date_format(date_create($produccion->fecha),"d/m/Y").'<span class="close" data-dismiss="alert">×</span></div>';
	}*/
?>	
<!-- end #content -->

<div id="popover-content" class="hide">

</div>


<?php $this->load->view('view_scripts') ?>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/js/form-plugins.js"></script>
<script src="<?= base_url(); ?>assets/plugins/parsley/dist/parsley.js"></script>
<script src="<?= base_url(); ?>assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<style type="text/css">
	.nopadding{
		padding: 0 !important;
	}
</style>
<script>
	$(document).ready(function() {
		App.init();
		FormPlugins.init();
		//cambio el item activo en el sidebar
		$("#ULsidebar > li").removeClass("active");
		$("#LIdeposito").addClass("active");$("#LIenplaya").addClass("active");		

		/*$('div.lugar').popover({ 
			html : true,
			placement: "top",
			content: function() {
				return '<form  action="<?= base_url(); ?>deposito/ingreso" method="POST">Ingreso: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value='+$(this).attr("id") +' name="lugar"><input style="width:50px;" type="number" name="cant" min="1" max='+($(this).attr("max")-$(this).attr("min"))+'> <button type="submit" class="btn btn-primary btn-xs">Ok</button></form><hr><form  action="<?= base_url(); ?>deposito/egreso" method="POST">Despacho: <input type="hidden" value='+$(this).attr("id") +' name="lugar"><input style="width:50px;" type="number" name="cant" min="1" max='+$(this).attr("min")+'> <button type="submit" class="btn btn-primary btn-xs">Ok</button></form>';
			}
		});	
		$('div.lugar').tooltip({placement: "top"});	
		*/
		if(<?=$mensaje;?>== 1) alert('Registrado con exito');		
		if(<?=$mensaje;?>== 2) alert('Número incorrecto');		
		/*
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(1)').prepend('<div class="naval">A</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(2)').prepend('<div class="naval">B</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(3)').prepend('<div class="naval">C</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(4)').prepend('<div class="naval">D</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(5)').prepend('<div class="naval">E</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(6)').prepend('<div class="naval">F</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(7)').prepend('<div class="naval">G</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(8)').prepend('<div class="naval">H</div>')});
		$('.tab-pane').each(function(){ $(this).find('div.row:eq(5)').prepend('<br><br><h5 class="text-center">Nave 2</h5>')});
		*/

		
	});

	/*$('body').on('click', function (e) {
		$('div.lugar').tooltip('hide');
		$("div.lugar").each(function () {
			if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
				$(this).popover('hide');
			}
		});
	});*/
</script>	
</body>
</html>