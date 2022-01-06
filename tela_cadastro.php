<?php
require_once('controller/ticketController.php');
$m = new TicketController;
$titulo = "cadastro";
include_once('layout/header.php');

?>

<script type="text/javascript" src="layout/assets/js/jquery.js"></script>
<h1 class="text-warning bg-primary w-1">Ticket</h1>
<header class="border w-10 p-3 bg-body position-relative  top-10 start-0 end-0">
    <nav class="navbar navbar-light bg-light s">
        <div class="container-fluid">
            <div class="col-md-12 ">
                <a type="button" href="index.php" class="btn mb-3 btn-outline-primary w-20">
                    <i class="far fa-hand-point-left"></i>
                    Voltar
                </a>
                <form class="row g-3" method="POST" id="form" action="">

                    <div class="col-sm-4">
                        <label for="assunto">Assunto</label>
                        <input name="assunto" class="form-control" id="assunto" type="text" placeholder="Assunto" aria-label="Search">
                    </div>
        
                    <div class="col-auto">
                        <label for="codigo">tick codigoredmine</label>
                        <input name="codigoredme" id="codigo" type="text" id="codigoredme" class="form-control">
                    </div>
                    <label for="exampleFormControlTextarea1">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="7"></textarea>
            </div>
            <div class="col-auto ">
                <a class="btn btn-outline-success btn-left mt-4" onclick="cadastrar()" id="salvar" name="salvar">Salvar</a>
            </div>
            </form>
        </div>

        <script type="text/javascript">
            function cadastrar() {
                $.ajax({

                    url: "tela_cadastro.php?comando=Cadastrar",
                    method: "POST",
                    data: $("#form").serialize(),
                    success: function() {
                        Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: 'Ticket Cadastrado com Sucesso!',
                        
                        })
                        $("#codigo").val("");
                        $("#assunto").val("");
                        $("#descricao").val("");
                    }


                });
            }

            $(function(){
                $("#form").submit(function() { //no submit do formulário
                 //coloca todos valores de todos inputs do form como vazio
                
            });
            });
        </script>

        </div>
    </nav>
</header>