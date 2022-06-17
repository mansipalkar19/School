<?php $this->load->view('header'); ?>

<style type="text/css">
    .bg-light{
        background: #fff !important;
    }
</style>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <img src="<?php echo base_url()?>assets/images/iconschool.png" class="imgs" style="width: 15%;margin: 20px;">
        <div class="spacing" style="border: 2px solid gray;padding: 20px;">
            <form action="<?php echo base_url(); ?>schools/do_add" id="frmvalidate" method="post">
            <h2 style="margin:10px">Add Schools</h2>
            <?php
          if(isset($error_msg))
          {
            if($error_msg!= '')
            {
              ?>
              <div class="alert alert-danger">
                
                <?php echo $error_msg; ?>
              </div>
              <?php
            }
          }
          ?>
            <div class="form-group  mb-3">
                <input type="text" class="form-control" name="schoolname" placeholder="Enter School Name" required="">
            </div>
            <div class="form-group  mb-3">
                <input type="text" class="form-control" name="location" placeholder="Enter Location" required="">
            </div>
            <input type="submit" class="btn btn-primary btn-lg" value="Submit" style="width:400px;">
           
            </form>
        </div><br>

        <div>
            <a href="<?php echo base_url(); ?>schools"><b>Go Back</b></a>
        </div>

    </div>
    <div class="col-md-4"></div>
</div>

    </tbody>
  </table>
</div>


</body>
</html>
<?php $this->load->view('footer'); ?>