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
            <form action="<?php echo base_url(); ?>account/do_login" id="frmvalidate" method="post">
            <h2 style="margin:10px">Sign-In</h2>
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
                <input type="text" class="form-control" name="email" placeholder="Enter Email" required="">
            </div>
            <div class="form-group  mb-3">
                <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
            </div>
            <input type="submit" class="btn btn-primary btn-lg" value="Continue" style="width:400px;">
            <p style="margin-top: 20px;font-size: 14px; ">By continuing, you agree to Conditions of Use and Privacy Notice.</p>
            <p><u>Need Help?</u></p><br>
           
            </form>
        </div><br>

        <div>
            <p class="text-center">New to Login?</p>
            <a href="<?php echo base_url(); ?>account/register"><b>Create your account</b></a>
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