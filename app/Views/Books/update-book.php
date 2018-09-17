<br/><br/>
<div class="container">
    <h1 class="mt-5" style="text-align: left"><?php echo $viewModel['pageTitle']?></h1> <br />
    <form novalidate id="updateBookForm">
        <div class="form-row">
        <label for="title">Title</label>
        <input type="text" name="title" class="updateTextField" id="title" value="<?php echo $viewModel['book']['title']?>" required/>
        </div>

        <div class="form-row authorRow">
        <label for="author_id">Author</label>
        </div>

        <div class="form-row categoryRow">
        <label for="category_id">Category</label>
        </div>

        <div class="form-row">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" class="updateTextField" id="isbn" value="<?php echo $viewModel['book']['isbn']?>" required/>
        </div>

        <div class="form-row">
        <label for="price">Price</label>
        <input type="text" name="price" class="updateTextField" id="price" value="<?php echo $viewModel['book']['price']?>" required />
        </div>

        <div class="form-description">
        <label for="description">Summary</label>
        <textarea id="description" name="description"><?php echo $viewModel['book']['description']?></textarea>
        </div>

        <div class="form-submit">
            <input class="btn btn-info" type="submit" value="Opslaan"/>
        </div>
    </form>

    <script>
        let bookId = <?php echo $viewModel['book']['id']?>;
        let categoryId = <?php echo $viewModel['book']['category_id']?>;
        let authorId = <?php echo $viewModel['book']['author_id']?>;
    </script>
    <script src="js/update-book.js"></script>
</div>

