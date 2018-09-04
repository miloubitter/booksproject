<br/>
<h1 class="mt-5"><?php echo $viewModel['pageTitle']?></h1>
<div class="container">
    <form novalidate id="createBookForm">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required/>
                </div>

                <div class="form-group authorRow">
                    <label for="author_id">Author</label> <br/>
                </div>

                <div class="form-group categoryRow">
                    <label for="category_id">Category</label> <br />
                </div>

                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-control" pattern="^\d{10,13}$" required/>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control" pattern="^\d{1,5}(\.\d{1,2})?$" required/>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group description-wrapper" >
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>
            </div>
        </div>
            <br clear="all" />

            <button type="submit" class="btn btn-info float-md-right">Save</button>
            <button type="button" class="btn btn-secondary float-sm-left" onclick="window.location = '?route=index'"><i class="fa fa-caret-left"></i> Back</button>

    </form>
    <br clear="all" />

    <div class="message-container">

    </div>
</div>

<script src="js/new-book.js"></script>
