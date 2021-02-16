<style>
form.cmxform label.error { color: red; font-size: 12px; font-weight: normal; font-style: normal;margin-top: 5px}
form.cmxform label {
  width: auto;
  display: block;
  float: none;
}
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add member</h1>
            </div>
        </div>
        <div class="panel panel-default panel-pad">
            <div class="panel-body">
            <div class="alert alert-info" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    <li>First fill the <span style="color: red;font-weight: bold">phone</span> field</li>
                    <li>Be sure about the phone number</li>
                    <li>Please do not add Mr, Miss, Md before the name</li>
                </ul>
            </div>
                    <?php
                        if (isset($memErr)) {
                            echo"<div id='from-error' style='border:1px solid red;padding:5px 10px; margin: 5px;color:red'>";
                            foreach ($memErr as $key => $value) {
                                switch ($key) {
                                    case 'name':
                                        foreach ($value as $val) {
                                            echo"Name: ".$val."</br>";
                                        }
                                        break;

                                    case 'gender':
                                        foreach ($value as $val) {
                                            echo"Gender: ".$val."</br>";
                                        }
                                       break;

                                    case 'member':
                                        foreach ($value as $val) {
                                            echo"Member: ".$val."</br>";
                                        }
                                       break;

                                    case 'type':
                                        foreach ($value as $val) {
                                            echo"Type: ".$val."</br>";
                                        }
                                       break;

                                    case 'phone':
                                        foreach ($value as $val) {
                                            echo"Phone: ".$val."</br>";
                                        }
                                        break;
                                    
                                    default:

                                        break;
                                }
                            }
                            echo"</div>";
                        }
                    ?>             
                <form class="cmxform" id="form1" action="<?php echo BASE_URL;?>/Member/addMember" method="post">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="name">Name</label>
                                 <input type="text" id="name" name="name" class="form-control" />
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <input type="text" id="phone" name="phone" class="form-control" />
                                 <div id="result"></div>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="gender">Gender</label>
                                 <select name="gender" id="gender"  class="form-control">
                                        <option value="">Select</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="member">Member type</label>
                                 <select name="member" id="member" class="form-control">
                                        <option value="">Select</option>
                                        <option value="qa">QA</option>
                                        <option value="qg">QG</option>
                                        <option value="qpm">QPM</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="type">Activity</label>
                                 <select name="type" id="type" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Regular</option>
                                        <option value="2">Irregular</option>
                                        <option value="3">New</option>
                                        <option value="4">Average</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="batch">Reg.</label>
                                 <input type="text" id="reg" name="reg" class="form-control"/>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="batch">Batch</label>
                                 <input type="text" id="batch" name="batch" class="form-control"/>
                             </div>
                         </div>
                         
                     </div>

                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label id="comment">Comment</label>
                                 <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="panel panel-default">
                                <div class="panel-body">
                                   <legend class="text-left">Programme</legend>
                                   <div class="form-group">
                                   <?php 
                                       foreach ($progname as $key => $value) {
                                   ?>
                                        <div class="checkbox">
                                            <label class="checkbox-inline">
                                              <input name="tag[]" type="checkbox" value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?>
                                            </label>
                                        </div>
                                    <?php }?>                      
                                    </div>                                   
                                </div>
                             </div>                            
                         </div>
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                </form>
            </div>
        </div>        
    </div>
</div><!--#page-wrapper-->
