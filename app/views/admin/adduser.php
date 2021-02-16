<style>
form.cmxform label.error { color: red; font-size: 15px; font-weight: normal; font-style: italic;}
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
                <h1 class="page-header">Add user</h1>
            </div>
        </div>
        <div class="panel panel-default panel-pad">
            <div class="panel-body">
                    <?php
                        if (isset($userErr)) {
                            echo"<div id='from-error' style='border:1px solid red;padding:5px 10px; margin: 5px;color:red'>";
                            foreach ($userErr as $key => $value) {
                                switch ($key) {
                                    case 'name':
                                        foreach ($value as $val) {
                                            echo"Name: ".$val."</br>";
                                        }
                                        break;

                                    case 'username':
                                        foreach ($value as $val) {
                                            echo"Username: ".$val."</br>";
                                        }
                                       break;

                                    case 'level':
                                        foreach ($value as $val) {
                                            echo"User Role: ".$val."</br>";
                                        }
                                       break;

                                    case 'password':
                                        foreach ($value as $val) {
                                            echo"Password: ".$val."</br>";
                                        }
                                       break;
                                    
                                    default:

                                        break;
                                }
                            }
                            echo"</div>";
                        }
                    ?>             
                <form class="cmxform" id="form6" action="<?php echo BASE_URL;?>/User/createUser" method="post">
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
                                 <label for="username">Username</label>
                                 <input type="text" id="username" name="username" class="form-control" />
                             </div>
                         </div>                        
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="level">User Role</label>
                                 <select name="level" id="level" class="form-control">
                                       <option value="">Select</option>
                                       <option value="2">Admin</option>
                                       <option value="3">Editor</option>
                                 </select>
                             </div>                             
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="password" name="password" class="form-control" id="password" />
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


