<div class="jumbotron">
    <div class="container">
        <h1 class="display-3 text-center">Rejestracja</h1>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="offset-md-3 col-md-6 offset-md-3 col-xs-12 col-sm-12">
           <?php echo form_open('register/action'); ?>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" id="login" name="login" required autofocus>
            </div>
                <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" class="form-control" id="password" name="password" required >
            </div>
                <div class="form-group">
                <label for="password_repeat">Powtórz hasło:</label>
                <input type="password" class="form-control" id="password_repeat" name="password_repeat" required >
            </div>
                 <button type="submit" class="btn btn-primary">Zarejestruj się</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


