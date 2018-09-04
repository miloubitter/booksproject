<div class="jumbotron jumbotron-fluid my-5">
    <div class="container pt-4">
        <h1 class="display-4 text-warning text-center">Book Catalog</h1>
        <p class="lead text-white text-center">Welcome to the book catalog. <br /> Click on the books to see their details!.</p>
    </div>
</div>
<!--<br />-->
<!--<h1 class="mt-5">--><?php //echo $viewModel['pageTitle']?><!--</h1>-->

<div class="container">
    <div class="row">
        <div class="col">
<!--            <p class="intro"> <br /> Welcome to the book catalog. <br /> Click on the books to see their details!</p>-->

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

            <?php
            //    foreach($viewModel['books'] as $id=>$book){
            //        echo "
            //        <tr onclick=\"window.location = '?route=show&id={$book['id']}'\">
            //            <td>{$book['title']}</a></td>
            //            <td class=\"d-none d-sm-table-cell\">{$book['author_id']}</td>
            //            <td class=\"d-none d-sm-table-cell\">{$book['isbn']}</td>
            //            <td>{$book['price']}</td>
            //        </tr>
            //        ";
            //    }
            //
            //    ?>

            </table>

            <br clear="all" />

            <?php if($viewModel['profile']) { ?>

            <div class="float-sm-right"><a class="btn btn-info" href="?route=create"><i class="fa fa-plus"></i> New book</a></div>

            <?php } ?>
        </div>
    </div>
</div>

<script src="js/listing.js"
