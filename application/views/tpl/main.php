<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Main</h1>
        <p>Jesteś zalogowany. Witaj <?php echo $login ?>.</p>
        <p><input type="text" id="copier-value" class="form-control" value="http://www.example.com/<?php echo $token; ?>"placeholder="Tekst do skopiowania"></p>

        <button class="btn btn-warning btn-lg" id="copier-submit">Skopiuj!</button>
    </div>
</div>
