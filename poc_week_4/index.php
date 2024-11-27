<?php include 'header.php'; ?>
<?php 
    include 'config/connect.php';
    $userList;
    $query = "SELECT *,date(created_at) as formated_date FROM users"; 

    $rs = pg_query($pdo, $query) or die("Cannot execute query: $query\n");

    $userList = pg_fetch_all($rs);
?>

<main>

    <div class="d-flex justify-content-end mt-3 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add User</button>
    </div>

    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="user Id">#</th>
                <th scope="col">First Name </th>
                <th scope="col">Last Name</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col">Mobile</th>

                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Pin Code</th>
                <th scope="col">Created Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($userList)){ 
                    foreach($userList as $user){
            ?>
                <tr>
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['f_name']; ?></td>
                    <td><?php echo $user['l_name']; ?></td>
                    <td><?php echo $user['dob']; ?></td>
                    <td><?php echo $user['mob']; ?></td>

                    <td><?php echo $user['address']; ?></td>
                    <td><?php echo $user['city']; ?></td>
                    <td><?php echo $user['pin_code']; ?></td>
                    <td><?php echo $user['formated_date']; ?></td>
                    <td><button onclick="handle_swal(<?php echo $user['user_id']; ?>)" class="btn btn-danger">Delete</button></td>
                </tr>

            <?php }} ?>            
        </tbody>
    </table>


</main>

<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="add_user_form" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body m-2 p-1">
            <div class="row pb-2">
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="f_name" placeholder="Enter First Name" name="f_name">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="l_name" placeholder="Enter Last Name" name="l_name">
                  </div>
                </div>
            </div>
            
            <div class="row pb-2">
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Birth Date</label>
                  <input type="date" class="form-control" id="b_date" name="b_date">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile</label>
                  <input type="text" min="10" maxlength="10" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile">
                </div>
              </div>
            </div>
          
            <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <textarea type="text" class="form-control col-6" id="address" name="address" placeholter="Enter Address"></textarea>
            </div>

            <div class="row pb-2">
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="city" class="form-control" id="city" name="city" placeholder="Enter City Name">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Pincode</label>
                  <input type="text" min="6" maxlength="6" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
                </div>
              </div>
            </div>

          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >Submit</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>