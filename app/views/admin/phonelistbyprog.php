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
                <h1 class="page-header">Select phone list by programme</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-pad">
                    <div class="panel-body">                        
                        <form class="cmxform" id="formprog" action="<?php echo BASE_URL;?>/Phone/filterListByProgramme" method="get">
                            <fieldset>
                                <legend>Select member</legend>
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

                            <fieldset>
                               <span class="style-text"><legend>Select programme</legend></span>               
                                <div class="form-group">
                                    <select name="tag" id="tag" class="form-control">
                                          <option value="">Select programme</option>
                                          <?php 
                                               foreach ($progname as $key => $value) {
                                          ?>
                                          <option value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?></option>
                                          <?php }?>          
                                    </select>
                                </div>

                            </fieldset>

                            <div class="form-group">
                                <button  type="submit" class="btn btn-success">Submit</button>
                            </div>
                                                            
                        </form>                        
                    </div>
                </div>
             </div>          
        </div>                          
    </div>
</div><!--#page-wrapper-->