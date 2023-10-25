


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title" ">
             <a href="<?=base_url('')?>" class="text-dark">  <?=$title?> </a>
            </h3>
          </div>


        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
           
         <div class="table-responsive">
             <div class="row">
              <?php  if($this->session->flashdata('msg_del')){?>
                 <div class="text-center text-danger">
                   <?=$this->session->flashdata('msg_del')?>
                   <?=$this->session->unset_userdata('msg_del')?>
                </div>
                <?php }?>
       
                     <div class="col-md-12">
                        <?php if($request) { ?>
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">s/n</th>
                                <th scope="col"> Names</th>
                                <th scope="col"> Email</th>
                                <th scope="col">Request Title </th>
                                <th scope="col"> Reasons </th>
                                <th scope="col" class="text-center"> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $count =1; foreach($request as $row){?>
                                <tr>
                                  <th scope="row"><?=$count++?></th>
                                  <td> <?=$row->names?></td>
                                  <td> <?=$row->email?></td>
                                  <td> <?=$row->requesttitle?></td>
                                  <td> <?=$row->reasons?></td>
                                  <td> 
                                  <a href="<?=base_url('home/viewreq/'.$row->id)?>" class="btn btn-primary pt-2 pb-2 pr-2 pl-2"><i class="fa fa-eye"></i> View </a>
                                  <a href="<?=base_url('home/deletereq/'.$row->user_id)?>" class="btn btn-danger pt-2 pb-2 pr-2 pl-2"><i class="fa fa-eye" onclick="return confirm  ('Are Your Sure To Delete?')"></i>Delete </a>
                              </td>
                            </tr>
                            <?php } ?>
                  
                            </tbody>
                          </table>
                          <?php }else{?>
                               <h4 class="text-center">  No Request Yet  </h4> 
                           <?php } ?>
                    </div> 
             </div>


                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                      <button class="btn btn-social-icon btn-facebook btn-rounded">
                        <i class="fab fa-facebook-f"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">Facebook</h5>
                        <p class="mb-0">813 friends</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                      <button class="btn btn-social-icon btn-twitter btn-rounded">
                        <i class="fab fa-twitter"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">Twitter</h5>
                        <p class="mb-0">9000 followers</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                      <button class="btn btn-social-icon btn-google btn-rounded">
                        <i class="fab fa-google-plus-g"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">Google plus</h5>
                        <p class="mb-0">780 friends</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <button class="btn btn-social-icon btn-linkedin btn-rounded">
                        <i class="fab fa-linkedin-in"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">Linkedin</h5>
                        <p class="mb-0">1090 connections</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->