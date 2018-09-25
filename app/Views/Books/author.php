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
    </div> <br/>
    <hr>
<br/>
<div class="container">
    <div class="row">
     <div class="col-md-12">


     <h2>Books written by <?php echo $viewModel['author']['name'] ?></h2>

        <?php
        foreach ($viewModel['books'] as $id => $author) { ?>

            <article class="mb-5">

                <h3><a href="?route=show&id=<?php echo $author['id'] ?>" class="linkDetail"><?php echo $author['title']; ?></a></h3>
                <p>
                    <a href="?route=categoryDetailsShow&id=<?php echo $author['category_id'] ?>" class="intro linkCategory"><?php echo $author['category_name'] ?></a>
                </p>
                <?php if ($author['image_filename']) { ?>
                    <div class="mb-3">
                        <div>
                            <img class="imagesTable" src="images/<?php echo $author['image_filename']?>">
                        </div>
                    </div>
                    <p><?php echo $author['intro']?>
                        <a href="?route=show&id=<?php echo $author['id']?>" class="linkDetail">Click to read more...</a>
                    </p>
                <?php } ?> <br />

            </article>
            <hr>

        <?php } ?>
     </div>
    </div>
</div>
</div>

