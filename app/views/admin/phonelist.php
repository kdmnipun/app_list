<style>
form.cmxform label.error { color: red; font-size: 15px; font-weight: normal; font-style: italic;}
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
    font-style: italic;
    font-weight: normal;    
}
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Phone List</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">
                        <form class="cmxform" id="form5" action="<?php echo BASE_URL;?>/Phone/filterListByMember" method="get">
                            <fieldset>
                                <legend>Select Member</legend>
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>         
                            </div>
                            <small class="small-item"><mark>It will display all members in a table</mark></small>
                        </form>                        
                    </div>
                </div>
             </div>   
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">                        
                        <form class="cmxform" id="form3" action="<?php echo BASE_URL;?>/Phone/filterListByActivity" method="get">
                            <fieldset>
                                <legend>Select Member By Activity</legend>
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

                            <div class="form-group" style="margin-top:10px ">
                                <legend>Select Activity</legend>
                                <select name="type" id="type" class="form-control">
                                      <option value="">Select</option>
                                      <option value="1">Regular</option>
                                      <option value="2">Irregular</option>
                                      <option value="3">New</option>
                                      <option value="4">Average</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                                                            
                        </form>                        
                    </div>
                </div>
             </div>          
        </div>

    </div>
</div><!--#page-wrapper-->


