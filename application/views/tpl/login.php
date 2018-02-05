<div class="jumbotron">
    <div class="container">
        <h1 class="display-3 text-center">Logowanie</h1>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="offset-md-3 col-md-6 offset-md-3 col-xs-12 col-sm-12">
             <?php echo form_open('login/action'); ?>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" id="login" name="login" autofocus>
            </div>
             <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" class="form-control" id="password" name="password" >
             </div>
                 <button type="submit" class="btn btn-primary">Zaloguj się</button>
           <?php echo form_close(); ?>
        </div>
    </div>
</div>


