<div class="jumbotron jumbotronImage jumbotron-fluid my-5">
    <div class="container pt-4">
        <h1 class="display-4 texth1 text-center">Authors</h1>
        <p class="lead textP text-center">These are the authors of the books. <br /> Enjoy reading their biography.</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col" class="d-none d-sm-table-cell">Author </th>
                    <th scope="col" class="d-none d-sm-table-cell">Biography</th>

                </tr>
                </thead>

                <?php
                    foreach($viewModel['authors'] as $id=>$author){
                        echo "
                        <tr>
                            <td >{$author['name']}</a></td>
                            <td >{$author['bio']}</td>
                        </tr>
                        ";
                    }

                    ?>

            </table>        </div>
    </div>
</div>