<div class="jumbotron jumbotronCategory jumbotron-fluid my-5">
    <div class="container pt-4">
        <h1 class="display-4 texth1 text-center">Categories</h1>
        <p class="lead textP text-center">This are the categories of the books. <br /> </p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col" class="d-none d-sm-table-cell">Category </th>
                    <th scope="col" class="d-none d-sm-table-cell">Description</th>

                </tr>
                </thead>

                <?php
                    foreach($viewModel['categories'] as $id=>$category){

                        echo "
                        <tr>
                            <td >{$category['name']}</td>
                            <td >{$category['description']}</td>
                        </tr>
                        ";
                    }

                    ?>

            </table>        </div>
    </div>
</div>