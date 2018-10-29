<div class="jumbotron jumbotron-fluid my-5">
    <div class="container pt-4">
        <h1 class="display-4 texth1 text-center">Book Cataloggg</h1>
        <p class="lead textP text-center">Welcome to the book catalog. <br /> Click on the books to see their details!.</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Book cover</th>
                        <th scope="col">Title</th>
                        <th scope="col" class="d-none d-sm-table-cell">Author</th>
                        <th scope="col" class="d-none d-sm-table-cell">Category</th>
                        <th scope="col" class="d-none d-sm-table-cell">ISBN</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <br clear="all" />

            <?php if($viewModel['profile']) { ?>

            <div class="float-sm-right"><a class="btn btn-info" href="?route=create"><i class="fa fa-plus"></i> New book</a></div>

            <?php } ?>
        </div>
    </div>
</div>

<script src="js/listing.js"></script>
