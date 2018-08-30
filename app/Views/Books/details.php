<div class="container">
    <div class="row">
        <div class="col">
            <h1><?php echo $viewModel['book']['title']?></h1>
                <div class="votes">
                    <div class="vote-count" data-id="<?php echo $viewModel['book']['id']?>"><?php echo $viewModel['book']['votes']?></div>
                    <a class="up-vote" href="#"><i class="far fa-thumbs-up"></i></a>
                    <a class="down-vote" href="#"><i class="far fa-thumbs-down"></i></a>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><b>Author</b><br />
                            <?php echo $viewModel['book']['author_id']; ?></p>

                        <p><b>ISBN</b><br />
                            <?php echo $viewModel['book']['isbn']; ?></p>

                        <p><b>Price</b><br />
                            &euro; <?php echo $viewModel['book']['price']; ?></p>

                        <p><b>Description</b><br />
                            <?php echo $viewModel['book']['description']; ?></p>
                    </div>
                    <div class="col-md-6">

                        <?php if($viewModel['imagePath']) { ?>

                        <img class="mb-4 rounded-circle" style="border: solid 5px #03553e !important;" src="<?php echo $viewModel['imagePath']; ?>" width="100%" />

                        <?php } ?>

                        <?php if ($viewModel['profile']) { ?>

                            <form action="?route=upload-image&id=<?php echo $viewModel['book']['id'] ?>" enctype="multipart/form-data" method="post">
                                <p><b>Select image file to upload</b></p>
                                <p><input type="file" name="imageFile" id="imageFile" accept="image/*"/></p>
                                <p><input class="btn btn-info" type="submit" value="Upload" name="submit" /></p>
                            </form>

                        <?php } ?>
                    </div>
                </div>

            <button onclick="window.location = '?route=allbooks'"type="button" class="btn btn-secondary">Back</button>
                <?php if($viewModel['profile']) { ?>
                <button onclick="window.location = '?route=edit&id=<?php echo $viewModel['book']['id'] ?>'"type="button" class="btn btn-info">Edit book</button>
                <?php } ?>
        </div>
    </div>
</div>
