<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <title>CryptoGen</title>

    <!-- CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/styles.css?ver=<?php echo rand(); ?>" rel="stylesheet">

  </head>

   <body>

    <?php
    $data['logged_in'] = $this->session->userdata('logged_in');
    $this->load->view('tpl/menu',$data);
    ?>

   <div>
            <?php
            if (($this->session->flashdata('item'))) {
                $message = $this->session->flashdata('item');
                ?>

                <div class="alert alert-<?php echo $message['class']; ?> alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"
                                                                                                      style="color: #000;">×</span>
                    </button>
                    <p class="alert-body"><?php echo $message['message']; ?></p>
                </div>
                <?php
            }
            ?>
        </div>
