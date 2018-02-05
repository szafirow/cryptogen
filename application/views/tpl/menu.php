 <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url()?>">CryptoGen</a>




      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav ml-auto">
          <?php  if(!$logged_in): ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('login')?>">Logowanie</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('register')?>">Rejestracja</a>
          </li>
           <?php else: ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('login/logout')?>">Wyloguj</a>
          </li>
           <?php endif; ?>
        </ul>

      </div>
    </nav>