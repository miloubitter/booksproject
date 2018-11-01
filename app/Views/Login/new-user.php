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
                            <label for="username">Email</label>
                            <input type="text" name="username" id="username" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
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

                <a class="btn btn-primary" href="?route=register-user" role="button">Create a new user</a>

            </form>
        </div>
    </div>
</div>