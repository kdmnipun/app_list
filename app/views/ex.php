<h2 class="text-center">List:QG</h2> 
ex -page
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
<?php
   foreach ($membysearch as $value) {

                
?>              
      <tr>
        <td><?php echo$value['name'];?></td>
        <td><?php echo$value['phone'];?></td>
        <td><?php echo$value['comment'];?></td>
      </tr>               

<?php }?>        
    </tbody>
  </table>
  
 onkeyup="getStates(this.value)"