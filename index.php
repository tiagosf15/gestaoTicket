<?php
include_once('controller/ticketController.php');
$oTicketController = new TicketController();

$titulo = "Início";
include_once('layout/header.php');

?>
<script type="text/javascript" src="layout/assets/js/jquery.js"></script>
<h1 class="text-warning bg-primary w-1">Ticket</h1>
<header class="border w-10 p-3 bg-body position-relative  top-10 start-0 end-0">
    <nav class="navbar navbar-light bg-light s">
        <div class="container-fluid">
            <div class="col-md-12 ">
                <form class="row g-3" method="POST" action="">

                    <div class="col-auto">
                        <label for="dataf" class="">Data fim</label>
                        <input type="date" class="form-control " id="dataf" name="dataf" value="">
                    </div>
                    <div class="col-auto">
                        <label for="dataI">Data início</label>
                        <input name="dataI" id="dataI" class="form-control dataI" type="date">
                    </div>

                    <div class="col-auto">
                        <label for="codigo">tick codigo</label>
                        <input name="codigo" id="codigo" type="text" id="codigo" class="form-control">
                    </div>

                    <div class="col-sm-4">
                        <label for="assunto">Assunto</label>
                        <input name="assunto" class="form-control" id="assunto" type="text" placeholder="Assunto" aria-label="Search">
                    </div>
                    <div class="col-auto ">
                        <button class="btn btn-outline-success mt-4" name="pesquisar">Pesquisar</button>
                    </div>

                </form>
            </div>



        </div>
    </nav>
</header>




</br>


<button type="button" class="btn btn-light w-20 ">
    <i class="fas fa-plus"></i>
</button>

</br></br>
<header class="bg-body w-40">



    <table id="table" class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tema</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tick Data</th>
            </tr>
        </thead>
        <tbody id="tabela">

        </tbody>
    </table>


    <?php

    //$tiket_cadastro = new Tikets_cadastro();
    //$tiket_cadastro -> pegar();


    ?>





</header>

<script type="text/javascript">
    function buscarNome(assunto) {
        $.ajax({

            url: "index.php",
            method: "POST",
            data: {
                'comando': 'lsTabala',
                assunto: assunto
            },
            success: function(result) {
                var t = JSON.parse(result);

                var tabelaHtml = ""
                for (var i = 0; i <= t.length - 1; i++) {

                    tabelaHtml += " <tr>";
                    tabelaHtml += "<td>" + t[i].tick_codigoredmine + "</td>";
                    tabelaHtml += "<td>" + t[i].tick_tema + "</td>";
                    tabelaHtml += "<td>" + t[i].tick_descricao + "</td>";
                    tabelaHtml += "<td>" + t[i].data + "</td>";
                    tabelaHtml += "</tr>";
                    console.log(t);
                    // more statements 
                }
                $("#tabela").html(tabelaHtml);

            }
        });
    }

    $(document).ready(function() {
        buscarNome();

        $('#assunto').keyup(function() {
            var assunto = $(this).val();
            if (assunto != '') {
                buscarNome(assunto);
            } else {
                buscarNome();

            }

        });
    });
</script>






<?php


include_once('layout/footer.php');
?>