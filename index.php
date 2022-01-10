<?php
require_once('controller/ticketController.php');


$titulo = "Início";
$oTicketController = new TicketController();

include_once('layout/header.php');
?>
<script type="text/javascript" src="layout/assets/js/jquery.js"></script>
<h1 class="text-warning bg-primary w-1">Ticket</h1>
<header class="border w-10 p-3 bg-body position-relative  top-10 start-0 end-0">
    
    <nav class="navbar navbar-light bg-light s">
        <div class="container-fluid">
            <div class="col-md-12 ">
                <form class="row g-3" method="POST" id="form" action="">

                    <div class="col-auto">
                        <label for="dataf" class="">Data fim</label>
                        <input type="date" class="form-control " id="dataf" name="dataf" value="">
                    </div>
                    <div class="col-auto">
                        <label for="dataI">Data início</label>
                        <input name="dataI" id="dataI" class="form-control dataI" type="date">
                    </div>

                    <div class="col-auto">
                        <label for="codigo">tick codigoredmine</label>
                        <input name="codigo" id="codigo" type="text" id="codigo" class="form-control">
                    </div>

                    <div class="col-sm-4">
                        <label for="assunto">Assunto</label>
                        <input name="assunto" class="form-control" id="assunto" type="text" placeholder="Assunto" aria-label="Search">
                    </div>
                    <div class="col-auto ">
                        <a class="btn btn-outline-success mt-4" onclick="buscarNome()" id="pesquisar" name="pesquisar">Pesquisar</a>
                    </div>

                </form>
            </div>



        </div>
    </nav>
</header>




</br>


<a type="button" href="tela_cadastro.php" class="btn btn-light w-20 ">
    <i class="fas fa-plus"></i>
</a>

</br></br>
<header class="bg-body w-40">



    <table id="table" class="table">
        <thead>
            <tr>
                <th scope="col">Tick CódigoRedmine</th>
                <th scope="col">Tema</th>
                <th scope="col">Descrição Dos Tickets</th>
                <th scope="col">Tick Data</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="tabela" class="">

        </tbody>
    </table>


    <?php

    //$tiket_cadastro = new Tikets_cadastro();
    //$tiket_cadastro -> pegar();


    ?>





</header>

<script type="text/javascript">
    i = 1;
    while(i <2){
        buscarNome();
        i++;
    }
   function buscarNome() {
        $.ajax({

            url: "index.php?comando=lsTabala",
            method: "POST",
            data:$("#form").serialize(),
            success: function(result) {
                
                var t =JSON.parse(result);
                console.log(t[0].data);
                
                var tabelaHtml = ""
                for(var i = 0; i <= t.length -1; i++) {
                     
                   
                    tabelaHtml += " <tr>";
                    tabelaHtml += "<td style='width: 11rem;'>" + t[i].tick_codigoredmine + "</td>";
                    tabelaHtml += "<td>" + t[i].tick_tema + "</td>";
                    tabelaHtml += "<td style='width: 29rem;'><p  text-wrap'>" + t[i].tick_descricao + "</p></td>";
                    tabelaHtml += "<td>" + t[i].data + "</td>";
                    tabelaHtml += "<td><a class ='btn btn-danger' onclick='checar("+t[i].tick_codigo+")'>deletar</a></td>";
                    tabelaHtml += "<td><a class ='btn btn-primary' onclick='enviar("+ t[i].tick_codigo+")'>editar</td>";
                    tabelaHtml += "</tr>";
                    
                
                }
                
                $("#tabela").html(tabelaHtml);
           }
        });
    }
    function enviar(id){
                    $.ajax({
                    url:"index.php?comando=procurar",
                    method: "POST",
                    data:{'codigo2' : id},
                    success:function(){             
                        location.assign("tela_editar.php?tick_codigo="+id);
                    }
                    });
    }
     function checar(id){
                        Swal.fire({
                        title: 'Tem certeza?',
                        text: "O ticket será apagado para sempre!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, delete isso!'
                        }) .then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                            'Deletado!',
                            'O ticket foi deletado!.',
                            'success',
                            deletar(id)
                            
                            )
                        }
                        })
                    }
    function deletar(id){
                    $.ajax({
                    url:"index.php?comando=Delete",
                    method: "POST",
                    data:{'codigo1' : id},
                    success:function(){             
                        buscarNome();
                    }
                    });
                }
    
    
    $('#form').on('submit', function(e) {
        buscarNome();
        
        e.preventDefault();
      
    });
    $('#form1').on('submit', function(e) {
        deletar();
        
        e.preventDefault();
      
    });
  
    
   /*  $(document).on('loand',function() {
        buscarNome();
        $("#forms").keyup(function() {
            var assunto = $(this).val();
            if (assunto != '') {
                buscarNome(assunto);
            } else {
                buscarNome();

            }
        });
    }); */
</script>






<?php


include_once('layout/footer.php');
?>







<!-- 
function buscarNome(assunto) {
        $.ajax({

            url: "https://www.mercadobitcoin.net/api/BTC/ticker/",
            method: "GET",
            data:{'high': 'high'},
            success: function(result) {
                
                var t =result;
                console.log(result);
                var tabelaHtml = ""
               

                    tabelaHtml += " <tr>";
                    tabelaHtml += "<td>" + t['ticker'].last + "</td>";
                    tabelaHtml += "<td>" + t['ticker'].high + "</td>";
                    tabelaHtml += "<td>" + t['ticker'].low + "</td>";
                    tabelaHtml += "<td>" + t['ticker'].vol + "</td>";
                    tabelaHtml += "</tr>";
                   
                    // more statements 
                
                $("#tabela").html
                (tabelaHtml);

            }
        });
    }
 -->