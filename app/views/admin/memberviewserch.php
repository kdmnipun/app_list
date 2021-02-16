
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Member</h1>
        <?php
            if (!empty($_GET['msg'])) {
                  $msg = unserialize(urldecode($_GET['msg']));
                  if (isset($msg)) {
                      foreach ($msg as $key => $value) {
                            echo"<span style='color:green;font-weight:bold;'>".$value."</span>";
                         }

                  }else{
                    header("Location:".BASE_URL."/Member");
                  }  
                } 

        ?>                    
                </div>
            </div>
        <div class="panel panel-default panel-pad">
            <div class="panel-body">
                    <?php
                        if (isset($memErr)) {
                            echo"<div id='error' style='border:1px solid red;padding:5px 10px; margin: 5px;color:red'>";
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

                                    case 'activity':
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

                <?php
                    foreach ($memberbyid as $key => $value) {

                ?>                                 
                <form id="memberEdit" action="<?php echo BASE_URL;?>/Member/memberUpdate/<?php echo $value['id'];?>" method="post">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" name="name" class="form-control" value="<?php echo $value['name'];?>"/>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label>Gender</label>
                                 <select name="gender" class="form-control">
                                        <option value="">Select</option>
                                        <option <?php if ($value['gender'] == 'female' ) echo 'selected' ; ?> value="female"><?php echo"Female";?></option>
                                         <option <?php if ($value['gender'] == 'male' ) echo 'selected' ; ?> value="male"><?php echo"male";?></option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label>Member</label>
                                 <select name="member" class="form-control">
                                        <option value="">Select</option>
                                        <option <?php if ($value['member'] == 'qa' ) echo 'selected' ; ?> value="qa"><?php echo"QA";?></option>
                                       <option <?php if ($value['member'] == 'qg' ) echo 'selected' ; ?> value="qg"><?php echo"QG";?></option>
                                       <option <?php if ($value['member'] == 'qpm' ) echo 'selected' ; ?> value="qpm"><?php echo"QPM";?></option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label>Activity</label>
                                 <select name="type" class="form-control">
                                        <option value="">Select</option>
                                        <option <?php if ($value['type'] == 1 ) echo 'selected' ; ?> value="1"><?php echo"Regular";?></option>
                                        <option <?php if ($value['type'] == 2 ) echo 'selected' ; ?> value="2"><?php echo"Irregular";?></option>
                                        <option <?php if ($value['type'] == 3 ) echo 'selected' ; ?> value="3"><?php echo"New";?></option>

                                        <option <?php if ($value['type'] == 4 ) echo 'selected' ; ?> value="4"><?php echo"Average";?></option>
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label>Reg.</label>
                                 <input type="text" name="reg" class="form-control" value="<?php if(!empty($value['reg'])){echo $value['reg'];}?>"/>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label>Batch</label>
                                 <input type="text" name="batch" class="form-control" value="<?php if(!empty($value['batch'])){echo $value['batch'];}?>"/>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label>Phone</label>
                                 <input type="text" name="phone" class="form-control" value="<?php echo $value['phone'];?>"/>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label>Comment</label>
                                 <textarea name="comment" class="form-control" rows="3"><?php echo $value['comment'];?></textarea>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="panel panel-default">
                                 <div class="panel-body">
                                 <legend>Attendance Analysis</legend>
                                 <?php $tag = explode(",", $value['tag']);?>
                                   <?php 
                                       foreach ($progname as $key => $val) {
                                   ?>
                                   <?php if (in_array($val['id'], $tag)) {?>

                                     <a href="<?php echo BASE_URL;?>/Attendance/attenAnalysis?id=<?php echo $value['id'];?>&tag=<?php echo $val['id'];?>&tag_name=<?php echo $val['tag_name'];?>&name=<?php echo $value['name'];?>&member=<?php echo $value['member'];?>" class="label label-info pad" target="_blank"> <?php echo $val['tag_name'];?> </a>
                                 <?php }?>
                                 <?php }?>
                                 </div>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="panel panel-default">
                                <div class="panel-body">
                                   <legend class="text-left">Programme</legend>
                                   <div class="form-group">
                                   <input type='hidden' name='tag[0]' value='0'>
                                   <?php $tag = explode(",", $value['tag']);?>
                                   <?php 
                                       foreach ($progname as $key => $val) {
                                   ?>
                                        <div class="checkbox">
                                            <label class="checkbox-inline">
                                              <input name="tag[]" type="checkbox" value="<?php echo $val['id'];?>"
                                              <?php if (in_array($val['id'], $tag)) {
                                               echo "checked";
                                             }?>
                                             >
                                             <?php echo $val['tag_name'];?>
                                            </label>
                                        </div>
                                    <?php }?>                      
                                    </div>                                   
                                </div>
                             </div>                            
                         </div>
                     </div>                       
                     <div class="form-group">
                     <?php if(Session::get("userLevel")!=3){?>
                         <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn btn-danger" onclick="return confirm('Delete?')" href="<?php echo BASE_URL;?>/Member/deleteMember/<?php echo $value['id'];?>">Delete</a>
                          <?php }?>
                     </div>
                </form>
                <?php }?>
            </div>
        </div>                   
        </div>
    </div><!--#page-wrapper-->


