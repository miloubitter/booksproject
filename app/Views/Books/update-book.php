<h1><?php echo $viewModel['pageTitle']?></h1>
<div class="container">
    <form action="?route=edit&id=<?php $viewModel['book']['id']?>" method="post">
        <div class="form-row">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo $viewModel['book']['title']?>"/>
        </div>

        <div class="form-row">
        <label for="author_id">Author</label>
        <input type="text" name="author_id" id="author_id" value="<?php echo $viewModel['book']['author_id']?>"/>
        </div>

        <div class="form-row">
        <label for="category_id">Category</label>
        <input type="text" name="category_id" id="category_id" value="<?php echo $viewModel['book']['category_id']?>"/>
        </div>

        <div class="form-row">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" value="<?php echo $viewModel['book']['isbn']?>" />
        </div>

        <div class="form-row">
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="<?php echo $viewModel['book']['price']?>" />
        </div>

        <div class="form-description">
        <label for="description">Description</label>
        <textarea id="description" name="description"><?php echo $viewModel['book']['description']?></textarea>
        </div>

        <div class="form-submit">
            <input class="btn btn-info" type="submit" value="Opslaan"/>
        </div>
    </form>
</div>

