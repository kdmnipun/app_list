<style>
form.cmxform label.error { color: red; font-size: 12px; font-weight: normal; font-style: normal;}
form.cmxform label {
  width: auto;
  display: block;
  float: none;
}
form.cmxform label.error {
    display: none;
}
form.cmxform label.error, label.error {
    color: red;
    font-style: normal;
    font-weight: normal;    
}
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Attendance Info.</h1>
                <?php
                if (!empty($_GET['msg'])) {
                      $msg = unserialize(urldecode($_GET['msg']));
                      if (isset($msg)) {
                          foreach ($msg as $key => $value) {
                                echo $value;
                             } 
                      }else{
                        header("Location:".BASE_URL."/Admin");
                      }  
                    } 
                ?> 
            </div>
        </div>

        <!--Information of Attendance-->

        <div class="row">
            <div class="col-lg-12" style="margin-top: 25px">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">
                          <legend>Attendance Information By Date And Programme</legend>
                          <form id="infoForm" class="cmxform" action="<?php echo BASE_URL;?>/Attendance/dateByAttendance" method="get" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4"> 
                                    <div class="form-group">
                                      <select name="tag" id="tag" class="form-control">
                                        <option value="">Select Prog</option>
                                  <?php if(!empty($alltags)){
                                    foreach ($alltags as $key => $value) {
                                  ?>
                                        <option value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?></option>
                                  <?php }?>               
                                  <?php }?>               
                                      </select>
                                    </div>
                                  </div>
                                    <div class="col-lg-4 col-md-4"> 
                                    <div class="form-group">
                                      <select name="attend" id="attend" class="form-control">
                                            <option value="">Attendance Type</option>

                                            <option value="present">present</option>
                                            
                                            <option value="absent">absent</option>
                                      </select>
                                    </div>
                                  </div>
                                    <div class="col-lg-4 col-md-4"> 
                                    <div class="form-group">
                                            <input type="text" id="s_date" name="date" class="form-control" placeholder="Select Date" /> 
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                   <button type="submit" class="btn btn-primary col-lg-12 col-md-12">Search</button>
                                </div>
                          </form>
                    </div>
                </div> 
            </div>
        </div>

        <!-- of Attendance-->

        <div class="row">
            <div class="col-lg-12" style="margin-top: 25px">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">
                          <legend>Absent List, Last Prog. - Recent  Prog.</legend>
                          <form id="abForm" class="cmxform" action="<?php echo BASE_URL;?>/Attendance/infoAttendanceByDateDff" method="get" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">	
		                          	    <div class="form-group">
                                    <label>Select Prog.</label>

		                          	    	<select name="tag" id="tag" class="form-control">
		                          	    		<option value="">Select Prog</option>
					              	    		<?php if(!empty($alltags)){
					              	    			foreach ($alltags as $key => $value) {
					              	    		?>
		                          	    		<option value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?></option>
							                    <?php }?>      	    		
							                    <?php }?>      	    		
		                          	    	</select>
		                          	    </div>
	                          	    </div>

                                    <div class="col-lg-4 col-md-4"> 
                                        <div class="form-group">
                                              <label>Last Prog.</label>
                                                <input type="text" id="f_date" name="f_date" class="form-control" placeholder="Select Date" /> 
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">	
      	                          	    <div class="form-group">
                                                <label>Recent Porg.</label>
                                                <input type="text" id="t_date" name="t_date" class="form-control" placeholder="Select Date" /> 
      	                          	    </div>
	                          	      </div>
                          	    </div>

                          	    <div class="form-group">
                                   <button type="submit" class="btn btn-primary col-lg-12 col-md-12">Search</button>
                                </div>
                          </form>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-top: 25px">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">
                          <legend>Member Attendance By Year</legend>
                        <form class="cmxform" id="formprog" action="<?php echo BASE_URL;?>/Attendance/countMemberProAtn" method="get">
                            <fieldset>
                                <label for="">
                                    <input type="checkbox" class="checkbox" id="" value="qa" name="member[]" required minlength="1">QA
                                </label>
                                <label for="">
                                    <input type="checkbox" class="checkbox" id="" value="qg" name="member[]">QG
                                </label>
                                <label for="">
                                    <input type="checkbox" class="checkbox" id="" value="qpm" name="member[]">QPM
                                </label>

                                <label for="member[]" class="error">Please select at least two types of spam.</label>
                            </fieldset>
                            <div class="row">
                              <div class="col-md-4">
                                <fieldset>
                                  <div class="form-group">
                                  <label>Select Attendance</label> 
                                    <select name="attend" id="attend" class="form-control">
                                          <option value="">Attendance Type</option>

                                          <option value="present">present</option>
                                          
                                          <option value="absent">absent</option>
                                    </select>
                                  </div>
                                </fieldset>
                              </div>
                              <div class="col-md-4">
                                <fieldset>
                                   <label>Select programme</label>               
                                    <div class="form-group">
                                        <select name="tag" id="tag" class="form-control">
                                              <option value="">Select programme</option>
                                              <?php 
                                                   foreach ($alltags as $key => $value) {
                                              ?>
                                              <option value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?></option>
                                              <?php }?>          
                                        </select>
                                    </div>
                                </fieldset>
                              </div>
                              <div class="col-md-4">
                                <fieldset>
                                <label>Select Year</label>
                                <div class="form-group">
                                  <input type="text" class="yearpicker form-control" name="year" id="">
                                </div>
                              </div>
                              <fieldset>
                            </div>                           
                            <div class="form-group">
                                <button  type="submit" class="btn btn-primary col-lg-12 col-md-12">Submit</button>
                            </div>
                                                            
                        </form>  
                    </div>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="margin-top: 25px">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">
                          <legend>Member Attendance Analysis</legend>
                          <form id="infoAtn" class="cmxform" action="<?php echo BASE_URL;?>/Attendance/selectAbsentMemByProg" method="get" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4"> 
                                    <div class="form-group">
                                    <label>Select Prog.</label>

                                      <select name="tag" id="tag" class="form-control">
                                        <option value="">Select Prog</option>
                                  <?php if(!empty($alltags)){
                                    foreach ($alltags as $key => $value) {
                                  ?>
                                        <option value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?></option>
                                  <?php }?>               
                                  <?php }?>               
                                      </select>
                                    </div>
                                  </div>
                                    <div class="col-lg-4 col-md-4"> 
                                    <div class="form-group">
                                    <label>Attendance Type</label>
                                      <select name="attend" id="attend" class="form-control">
                                            <option value="">Attendance Type</option>

                                            <option value="present">present</option>
                                            
                                            <option value="absent">absent</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-lg-4 col-md-4">
                                  <label>Number(Times)</label> 
                                  <div class="form-group">
                                      <input id="num" type="text" name="num" class="form-control">
                                  </div>
                                  </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-md-4"> 
                                    <div class="form-group">
                                    <label>From</label>
                                    <input type="text" id="fdate" name="fdate" class="form-control" placeholder="Older Date">
                                    </div>
                                  </div>
                                    <div class="col-lg-4 col-md-4"> 
                                    <div class="form-group">
                                    <label>To</label>
                                    <input type="text" id="tdate" name="tdate" class="form-control" placeholder="Recent Date">
                                    </div>
                                  </div>                         
                                </div>
                                <div class="form-group">
                                   <button type="submit" class="btn btn-primary col-lg-12 col-md-12">Search</button>
                                </div>
                          </form>
                    </div>
                </div> 
            </div>
        </div>

    </div>
</div>