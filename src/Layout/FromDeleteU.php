<div class="DeleteUser ">
  <form class="container-fluid" action="../Controller/AdminController.php" method="post">
    <div class="form-group">
      <div class="headerEditC">
        <h2>Delete User</h2>
        <svg onclick="toggleShowDeleteU()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-x-lg" viewBox="0 0 16 16">
          <path
            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
      </div>
      <label for="exampleInputEmail1">Id user</label>
      <input type="text" class="form-control" id="IdUser" placeholder="Id" name="IdUser" value="" />
      <label class="lableInput" for="exampleInputEmail1">Email</label>
      <input type="text" class="form-control" id="EmailUser" placeholder="Email" name="EmailUser" />
      <div class="layoutbtn">
        <input class="btn btn-outline-success btnSubmitEdit" name="btnSubmitDeleteU" type="submit" value="Submit">
      </div>
    </div>
  </form>
</div>