<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ACCAL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!--<link rel="stylesheet" href="css/normalize.css">-->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <div class="container">
            <div class="row">
                <div clas="col-md-12">
                    <div class=" text-center page-header">
                        <h1>Arquitectura de Computadoras <small>Calculadora</small></h1>
                    </div>
                </div>
            </div>
            <div class="row">                
                <div class="col-md-5">
                    <form class="form-horizontal" id="form" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sistema</label>
                            <div class="col-sm-10">
                                <select id="tipo_ope" class="form-control" name="tipo_operacion">
                                    <option value="binario" selected="true">Binario</option>
                                    <option value="octal">Octal</option>
                                    <option value="hexadecimal" >Hexadecimal</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x" class="col-sm-2 control-label">X</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="x" id="id_x" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="y" class="col-sm-2 control-label">Y</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="y" id="id_y" placeholder="">
                            </div>
                        </div>
                        <input type="hidden" name="operacion" id="tipo_operacion">
                        <button type="button" onclick="sumar()" class="btn btn-info btn-default btn-block"> <span class=" glyphicon glyphicon-plus"></span> <strong>Sumar</strong></button>
                        <button type="button" onclick="restar()"  class="btn btn-warning btn-default btn-block"><span class="glyphicon glyphicon-minus"></span> <strong>Restar</strong></button>
                        <button type="button" onclick="multiplicar()"  class="btn btn-success btn-default btn-block"><span class="glyphicon glyphicon-remove"></span> <strong>Multiplicar</strong></button>
                        <button type="button" onclick="dividir()"  class="btn btn-primary btn-default btn-block"><span class="glyphicon glyphicon-italic"></span> <strong>Dividir</strong></button>
                    </form>
                </div>
                <div class="col-md-7">
                    <div id="resultado"  class="row well">
                        <div class="col-md-12 jumbotron">
                            <h3 class="text-center text-info">UNIVERSIDAD TECNICA DEL NORTE</h3>
                            <h4 class="text-center text-danger">FICA</h4>
                            <h5 class="text-center text-muted">INGENIERIA EN SISTEMAS COMPUTACIONALES</h5>
                            <br>
                            <br>
                            <dl class="dl-horizontal">
                                <dt>INTEGRANTES:</dt>
                                <dd >Armando Maldonado Conejo</dd>
                                <dd >Rubén Tirira</dd>
                            </dl>
                            <h6 class='text-center'>2014 </h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--Script necesario para funcionamiento del app-->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>-->
        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/bootbox.min.js"></script>
        <script src="js/vendor/jquery.nicescroll.min.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<!--        <script>
            (function(b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] =
                        function() {
                            (b[l].q = b[l].q || []).push(arguments)
                        });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = '//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X');
            ga('send', 'pageview');
        </script>-->
    </body>
</html>
