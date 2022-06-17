<?php $this->load->view('header');?> 

<style type="text/css">
    
</style>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <img src="<?php echo base_url()?>assets/images/iconschool.png" class="imgs" style="width: 15%;margin: 20px;">
        
        <?php if(!empty(validation_errors())){?>
                    <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
        <?php
          if(isset($error_msg))
          {
            if($error_msg!= '')
            {
              ?>
              <div class="alert alert-danger">
                <!-- <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
                </button> -->
                <?php echo $error_msg; ?>
              </div>
              <?php
            }
          }
          ?>
        <div class="spacing" style="border: 2px solid gray;padding: 20px;">
            <form action="<?php echo base_url(); ?>account/do_register" id="frmvalidate" method="post">
            <h2 style="margin-top:-7px;">Create account</h2><hr>
                    <p><b>Your Name<span class="required">*</span></b></p>
                    <input type="text" class="form-control" name="name" required="" value="<?php echo set_value('name'); ?>">

                
                    <p><b>Email<span class="required">*</span></b></p>
                    <input type="email" class="form-control" name="email" required="" value="<?php echo set_value('email'); ?>">

                    <p><b>Password<span class="required">*</span></b></p>
                    <input type="password" class="form-control" name="password" required="" id="password-field">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                   
                    <p><b>Confirm Password<span class="required">*</span></b></p>
                    <input type="password" class="form-control" required="" name="repeat_password"><br>
                   
                    <input type="submit" class="btn btn-primary btn-lg  btn-block" value="Continue" style="width: 400px;">
                    
                    <p style="margin:5px"><b><a href="<?php echo base_url(); ?>account">Already have an account? Sign in</a></b></p>

                    <p style="margin:5px"><a style="color: #000;" href="javascript:void(0)" onclick="window.history.back()" class="btn btn-solid btn-sm">Go Back</a></p><br>
            </form>
        </div><br>
    </div>

   
</div>

    <div class="aro-pswd_info">
        <div id="pswd_info">
            <h4>Password must be requirements</h4>
            <ul>
                <li id="letter" class="invalid">At least <strong>8 character</strong></li>
                <li id="capital" class="invalid">One Uppercase Characters (A-Z)</li>
                <li id="number" class="invalid">One Lowercase Characters (a-z)</li>
                <li id="length" class="invalid">One Digit (0-9)</li>
                <li id="space" class="invalid">One Special Character (!@#$&*()\-_=+{};:,<.>§~)</li>
            </ul>
        </div>
    </div>

<?php $this->load->view('footer');?> 
