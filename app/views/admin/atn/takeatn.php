<style type="text/css">
.table-borderless > thead > tr > th{
  border-bottom:none;
}
.custompanel{

}
#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(http://localhost/app/webroot/img/loading-gif-png-5.gif) no-repeat center center;
  z-index: 10000;
}

#delModal.modal{
  z-index: 100000;
  background: none;
}
#selectModal.modal{
  z-index: 100000;
  background: none;
}
</style>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header" id="title">Programme:
                       <?php
                        if (isset($_GET['tag'])) {
                           $tag =$_GET['tag'];                 
                           foreach ($alltags as $val) {
                            if($tag==$val['id']){
                                  echo $val['tag_name'];
                            }
                          }
                        }
                      ?> (Take Attendance)            
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-6">
                         <button type="button" class="btn btn-success" id="button2" style=""><i class="fa fa-plus"></i> Add Member</button>
                      </div>
                      <div class="col-md-6">
                          <div class="panel panel-default" style="background:#eee;">
                              <div class="panel-body">
                                  <div id="countMember"></div>
                              </div>
                          </div>
                      </div>
                  </div>
                   

                    <div class="panel panel-default">
                      <div class="panel-body">
                          <form id="searchMem" autocomplete="off">
                            <label>Search Member</label>
                              <input type="text" id="searchkey" name="search" class="form-control" placeholder="Name/Mobile/Reg">
                          </form>
                          <div id="searchResult" style="display: none;position: relative;"></div>
                      </div>
                    </div>                    
                </div>                            
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <form id="takeAttendance" autocomplete="off">
                            <button type="submit" onclick="return atn_confirm()" id="atnBtn" class="btn btn-warning" style="margin: 10px 0px">Take Attendance
                            </button>
                            <h3 class="pull-right">Totall Attendance: <span id=""></span></h3>
                            <div class="panel panel-default">
                                <div class="panel-body">    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="text" id="datepicker" class="form-control" name="date" placeholder="Date">
                                                <input type="hidden" name="tag" id="tag" value="<?php echo $_GET['tag'];?>">
                                            </div>
                                            <div class="alert alert-danger" style="display: none;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <table id="datatables" class="table table-hover">
                            <thead>
                              <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Reg</th>
                                <th>Mobile</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="data_html">

                            </tbody>
                          </table>
                        </form>
                      </div>
                    </div>                    
                </div>                            
            </div>
        </div>
    </div><!--#page-wrapper-->
