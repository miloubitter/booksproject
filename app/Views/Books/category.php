<div class="jumbotron jumbotronCategory jumbotron-fluid my-5">
    <div class="container pt-4">
        <h1 class="display-4 texth1 text-center"><?php echo nl2br($viewModel['category']['name']) ?></h1>
        <p class="lead textP text-center"> <br /> </p>
    </div>
</div>

<div class="container">
    <class="row">
    <div class="col">

        <div class="col-md order-md-3">
            <p class="clearfix bg-light p-3 rounded">

                <?php echo nl2br($viewModel['category']['description']) ?>
            </p>
        </div>
    </div>
    <h2 class="mb-3">Alle blogs binnen de categorie <?php echo $viewModel['category']['name']; ?></h2>

    <?php
//    print_r($viewModel); exit;
    foreach ($viewModel['books'] as $id=> $book) { ?>

        <article class="mb-5">
            <h3><a href="?route=show&id=<?php echo $book['id']?>" class="linkDetail"><?php echo $book['title']?></a></h3>
            <p><a href="?route=authorDetailsShow&id=<?php echo $book['author_id']?>" class="linkCategory"><?php echo $book['author_name']?></a></p>


            <?php if ($book['image_filename']) { ?>
                <div class="mb-3">
                    <div class="img-height-main">
                        <img class="imagesTable" src="images/<?php echo $book['image_filename']?>">
                    </div>
                </div>
                <p><?php echo $book['intro']?>
                    <a href="?route=show&id=<?php echo $book['id']?>" class="linkDetail">Click to read more...</a>
                </p>
            <?php } ?> <br />

        </article>
        <hr>
    <?php } ?>
</div>

