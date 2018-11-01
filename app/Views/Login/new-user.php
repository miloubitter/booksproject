<br/><br/>

<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-5" style="text-align: left">Creat a New User</h1>

            <p>Please create a new user to login.</p>

            <form action="?route=register-user" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="hash">Password</label>
                            <input type="password" name="hash" id="hash" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" />
                        </div>
                    </div>
                </div>
                <br clear="all" />

                <a class="btn btn-primary" href="?route=index" role="button">Create a new user</a>
                <button type="submit" class="btn btn-success">Create a new user</button>


            </form>
        </div>
    </div>
</div>