<?php
include_once('controller/ticketController.php');
$oTicketController = new TicketController();
$titulo = "Início";
include_once('layout/header.php');
?>

<h1 class="text-warning bg-primary w-1">Ticket</h1>
<header class="border w-10 p-3 bg-body position-relative  top-10 start-0 end-0">
    <nav class="navbar navbar-light bg-light s">
        <div class="container-fluid">
            <div class="col-md-12 ">
                <form class="row g-3">
                    <div class="col-auto">
                        <label for="dataf" class="">Data fim</label>
                        <input type="date" class="form-control " id="dataf" value="">
                    </div>
                    <div class="col-auto">
                        <label for="dataI">Data início</label>
                        <input name="dataI" id="dataI" class="form-control dataI" type="date">
                    </div>
                    <div class="col-sm-6">
                        <label for="assunto">Assunto</label>
                        <input name="assunto" class="form-control" id="assunto" type="search" placeholder="Assunto" aria-label="Search">
                    </div>
                    <div class="col-auto ">
                        <button class="btn btn-outline-success mt-4" type="submit">Pesquisar</button>
                    </div>
                </form>
            </div>



        </div>
    </nav>
</header>
</br>


<button type="button" class="btn btn-light w-20 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
    </svg>
</button>
</br></br>
<header class="bg-body w-40">
    <?php
    $i = 10;
    while ($i <= 100) {
        echo "resultado</br>";
        $i++;
    } ?>


</header>


<?php
include_once('layout/footer.php');
?>