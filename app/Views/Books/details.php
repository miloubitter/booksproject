
<div class="container">
    <div class="row">
        <div class="col">
            <br/><br/>
            <div class="titleText mt-5">
            <!--       Javascript created content (h1)        -->
            </div> <br/>

                <!-- Image show on page     -->
                <div class="row">
                    <div class="col-md-6">
                        <?php if($viewModel['imagePath']) { ?>

                            <img class="mb-4 rounded" src="<?php echo $viewModel['imagePath']; ?>" width="350px" height="500px" />

                        <?php } ?>
                        <div class="votes">
                            <p><u><b>Did you like the book?</b></u></p>
                            <a class="up-vote" href="#"><i class="far fa-thumbs-up" style="color: limegreen"></i></a>
                            <a class="down-vote" href="#"><i class="far fa-thumbs-down" style="color: red"></i></a>
                            <div>
                                <span class="vote-count" style="font-weight: bold" data-id=" <?php echo $viewModel['book']['id']?>"><?php echo $viewModel['book']['votes']?></span> readers liked this book <br/>
                            </div>
                        </div>
                    <br/>

                        <?php if ($viewModel['profile']) { ?>
                            <!-- Image upload on page     -->
                            <form action="?route=upload-image&id=<?php echo $viewModel['book']['id'] ?>" enctype="multipart/form-data" method="post">
                                <p><b>Select image file to upload</b></p>
                                <p><input type="file" name="imageFile" id="imageFile" accept="image/*"/></p>
                                <p><input class="btn btn-info" type="submit" value="Upload" name="submit" /></p>
                            </form>

                        <?php } ?>
                    </div>
                    <!-- Book details     -->
                    <div class="col-md-6">
                        <div class="clearfix bg-light p-3 rounded">
                            <div class="authorText">
                                <b>Author</b><br />
                                <!--       Javascript created content (p)        -->
                            </div>

                            <div class="categoryText">
                                <b>Category</b><br />
                                <!--       Javascript created content (p)        -->
                            </div>

                            <div class="isbnText">
                                <b>ISBN</b><br />
                                <!--       Javascript created content (p)        -->
                            </div>

                            <div class="priceText">
                                <b>Price</b><br />
                                <!--       Javascript created content (p)       -->
                            </div>

                            <div class="descriptionText">
                                <b>Summary</b><br />
                                <!--       Javascript created content (p)        -->
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Buttons    -->
            <?php if(!$viewModel['profile']) { ?>
                <button onclick="window.location = '?route=allbooks'"type="button" class="btn btn-secondary">Back</button>
            <?php } ?>
            <div class="intro mt-3">
                    <?php if($viewModel['profile']) { ?>
                        <button onclick="window.location = '?route=allbooks'"type="button" class="btn btn-secondary">Back</button>
                        <button onclick="window.location = '?route=edit&id=<?php echo $viewModel['book']['id'] ?>'"type="button" class="btn btn-info">Edit book</button>
                        <button type="button" id="deleteButton" class="btn btn-danger">Delete book</button>
                    <?php } ?>
                </div>
        </div>
    </div>
</div>
<script>let bookId = <?php echo $viewModel['book']['id']?>;</script>
<script src="js/details-book.js"></script>
<script src="js/delete-book.js"></script>
