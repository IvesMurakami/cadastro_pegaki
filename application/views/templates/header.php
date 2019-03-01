<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MasterView</title>
        <link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <script src="<?php echo base_url();?>public/js/jquery-3.3.1.min.js?>"></script>
        <script src="<?php echo base_url();?>public/js/bootstrap.min.js?>"></script>
        <script src="<?php echo base_url();?>public/js/jquery.mask.js?>"></script>

        <style>
            .erro {
                color: #f00;
            }
        </style>
    </head>


        <body>

        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-12 text-center">
                        <a class="blog-header-logo text-dark" href="<?php echo base_url()?>">Cadastro de Estabelecimentos - Pegaki</a>
                    </div>
                </div>
            </header>

            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex ">
                    <a class="p-2 text-muted" href="<?php echo base_url()?>">Login</a>
                    <a class="p-2 text-muted" href="<?php echo base_url('estabelecimento/index')?>">Inicio</a>
                    <a class="p-2 text-muted" href="<?php echo base_url('estabelecimento/create');?>">Cadastrar estabelecimento</a>

                </nav>
            </div>