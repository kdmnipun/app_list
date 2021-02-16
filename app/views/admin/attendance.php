<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Attendance By Prog.</h1>
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

        <!--Take Attendance-->

        <div class="row" style="margin-top: 25px">
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">
                          <legend><h5>Take Attendance By Programme</h5></legend>
                          <form id="attnForm" class="cmxform" action="<?php echo BASE_URL;?>/Attendance/fillAttendance" method="get">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">		
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
                          	    </div>

                          	    <div class="form-group">
                                <button type="submit" class="btn btn-primary col-lg-12 col-md-12">Search</button>
                                </div>
                          </form>
                    </div>
                </div> 
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">
                        <legend><h5>View Report And Edit</h5></legend>
                          <form id="a_editForm" class="cmxform" action="<?php echo BASE_URL;?>/Attendance/editAttend" method="get" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">		
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