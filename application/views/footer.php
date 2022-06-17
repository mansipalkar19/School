  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?php
  if(isset($success_msg))
  {
    if($success_msg!= '')
    {
      ?>
      <div class="alert alert-success" role="alert" style="margin-top: 20px;">
      
        <?php echo $success_msg; ?>
      </div>
      <?php
    }
  }
  if(isset($error_msg))
  {
    if($error_msg!= '')
    {
      ?>
      <div class="alert alert-danger" role="alert" style="margin-top: 20px;>
        <?php echo $error_msg; ?>
      </div>
      <?php
    }
  }
  ?>

