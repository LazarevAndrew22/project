<div class="container">
    <h1 class="mt-4 mb-3">Registration</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/account/register" method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Your first name:</label>
                        <input type="text" class="form-control" name="firstName">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Your last name</label>
                        <input type="text" class="form-control" name="lastName">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Repeat password</label>
                        <input type="password" class="form-control" name="repassword">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registration</button>
            </form>
        </div>
    </div>
</div>