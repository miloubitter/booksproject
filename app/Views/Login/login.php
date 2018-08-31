<div class="container">
    <div class="row">
        <div class="col"
            </div><h1><?php echo $viewModel['pageTitle']?></h1>

                <p class="intro">Please enter your username and password to login.</p>

                <form action="?route=login" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <br clear="all" />

                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Login</button>
                </form>
            </div>
        </div>
    </div>
</div>