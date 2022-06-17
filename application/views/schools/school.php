<?php $this->load->view('header');?> 
<div style="margin-left:0px !important; ">

    <ul class="nav justify-content-end" style="background-color: #032c60;">

      <li class="nav-item">
        <a class="nav-link  " href="<?php echo base_url(); ?>account/logout" style="background-color:#032c60;color: #ffffff;margin-right: 50px;font-size: 20px;">Logout</a>
    </li>
</ul>

</div>



<div class="container">
    <div class="animated fadeIn">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-2" style="" >
             <!--  <a data-toggle="modal" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="nav-link disabled btn btn-primary" style="color:#ffffff;">Add School</a> -->
             <a type="button" class="btn btn-primary" href="<?php echo base_url(); ?>schools/create" >Add School</a>
         </div>
     </div>
 </div>
 
 <div class="row" style="margin-top:20px;margin-left: 900px;">
 <form class="row g-3" method="post" action="<?php echo base_url(); ?>schools">
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Email</label>
    <input type="text" class="form-control" id="staticEmail2" value="<?php if($this->session->userdata('filters')!=''){ echo $this->session->userdata('filters'); } ?>" name="search_name">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-success btn-sm"  style="margin-top: 5px;" >Search</button>
  </div>
  <div class="col-auto">
    <a type="button" href="<?php echo base_url(); ?>schools/reset" class="btn btn-danger btn-sm"  style="margin-top: 5px;" >Reset</a>
  </div>
  </form>
  
</div>
 <div class="row" style="margin-top: 20px;">

    <div class="col-lg-12">
        <div class="card table-responsive">
            <div class="card-header"><strong>School List</strong></div>
            <div class="card-body card-block">
                <table id="table_pagination" class="table table-bordered table-condensed table-hover table-striped ">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>School Name</th>
                            <th>Location</th>
                            <th style="width:100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(count($branch) > 0)
                        {
                            $y=0;
                            for($i=0;$i<count($branch);$i++)
                            {
                                ?>
                                <tr id="tr_<?php echo $branch[$i]['id'];  ?>">
                                    <td>#<?php echo $branch[$i]['id']; ?></td>
                                    <td><?php echo $branch[$i]['schoolname']; ?></td>
                                    <td><?php echo $branch[$i]['location']; ?></td>

                                    <td colspan="2">
                                        <a type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalremove_<?php echo $branch[$i]['id'];?>">Delete</i></a>

                                        <a type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit_<?php echo $branch[$i]['id'];?>" style="margin-top: 5px;" >Edit</a>

                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="modalremove_<?php echo $branch[$i]['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url(); ?>schools/delete">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <input name="id" type="hidden" class="form-control" required="" value="<?php echo $branch[$i]['id'];?>">
                                           Are you sure you want to delete this School Name?
                                       </div>
                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--=======================edit popup======================-->  
                    <div class="modal fade" id="modaledit_<?php echo $branch[$i]['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <form method="post" action="<?php echo base_url(); ?>schools/do_edit">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label for="cus_name" >School Name:</label>
                                        <input name="schoolname" type="text" class="form-control" required="" value="<?php echo $branch[$i]['schoolname'];?>">
                                        <input name="id" type="hidden" class="form-control" required="" value="<?php echo $branch[$i]['id'];?>">
                                    </div> 
                                    <div class="col-lg-12 form-group">
                                        <label for="mobile_no" >Location:</label>
                                        <input name="location" type="text" class="form-control" required="" value="<?php echo $branch[$i]['location'];?>">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
            }
        }else{ echo "<tr><td colspan='10'>No records found</td></tr>"; }?>
    </tbody>
</table>
<?php  echo $links; ?> 
</div>
</div>

</div>
</div>
</div>
</div>
</div>

<?php $this->load->view('footer');?> 