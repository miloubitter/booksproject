<div class="jumbotron jumbotronImage jumbotron-fluid my-5">
    <div class="container pt-4">
        <h1 class="display-4 texth1 text-center">Biografie van: </h1>
        <p class="lead textP text-center" style="font-size: 25pt"> <?php echo $viewModel['author']['name'] ?></p>
    </div>
</div>

<div class="container">
    <class="row">
        <div class="col">

            <div class="col-md order-md-3">
                <p class="clearfix bg-light p-3 rounded">

                    <?php echo nl2br($viewModel['author']['bio']) ?>
                </p>
            </div>
        </div>
    </div>
</div>

