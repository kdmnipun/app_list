<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All users</h1>
                <div class="alert alert-success" style="display: none;"></div>
                <?php
                if (!empty($_GET['msg'])) {
                      $msg = unserialize(urldecode($_GET['msg']));
                      if (isset($msg)) {
                          foreach ($msg as $key => $value) {
                                echo $value;
                             } 
                      }else{
                        header("Location:".BASE_URL."/User");
                      }  
                    } 
                ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-striped table-hover table-responsive text-center">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">Sl</th>
                                    <th  class="text-center" width="25%">Name</th>
                                    <th  class="text-center" width="15%">Username</th> 
                                    <th  class="text-center" width="15%">User Role</th>
                                    <th  class="text-center" width="25%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="hodm_results">

                            </tbody>
                        </table> 


                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>            
        </div>

    </div>
</div><!--#page-wrapper-->

<!--modal-->
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header style-border">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Sample Modal</h4>             
          </div>
        <div class="modal-body">
        <div class="alert alert-danger" style="display: none;"></div>
            <form id="userForm" method="post">
                 <input type="hidden" id="updateId" name="updateId" value="0">
                 <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" class="form-control"/>
                 </div>

                 <div class="form-group">
                     <label for="level">User Role</label>
                     <select name="level" id="level" class="form-control">
                            <option value="">Select</option> 
                            <option value="2">Admin</option> 
                            <option value="3">Editor</option> 
                     </select>
                 </div>
                 <div class="form-group">
                     <button type="submit" id="btnSave" class="btn btn-success">Update</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
            </form>
        </div>
      </div>
   </div>
 </div> 

  <!--Change password-->
  <div class="modal fade" id="passModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header style-border">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Sample Modal</h4>             
          </div>
        <div class="modal-body">
        <div class="alert alert-danger" style="display: none;"></div>
            <form id="passForm" method="post">
                 <input type="hidden" id="passId" name="passId" value="0">
                 <div class="form-group">
                     <label for="oldpass">New Password</label>
                     <input type="password" name="oldpass" id="oldpass" class="form-control"/>
                 </div>

                 <div class="form-group">
                     <label for="password">Re-Enter Password:</label>
                     <input type="password" name="password" id="password" class="form-control"/>
                 </div>
                 
                 <div class="form-group">
                     <button type="submit" id="btnSave" class="btn btn-success">Update</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                     
                 </div>
            </form>
        </div>
      </div>
   </div>
 </div> 


 <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
            Do you want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
