<div class="DeleteFormP ">
  <form class="container-fluid" action="../Controller/AdminController.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <div class="headerEditC">
        <h2>Delete</h2>
        <svg onclick="toggleShowDeleteP()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-x-lg" viewBox="0 0 16 16">
          <path
            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
      </div>
      <label for="IIdProductA">Id Product</label>
      <input type="text" class="form-control" id="IdDeleteP" placeholder="Id" name="IdDeleteP" value="" />

      <div class="layoutbtn">
        <input class="btn btn-outline-success btnSubmitEdit" name="btnSubmitDeleteP" type="submit" value="Submit">
      </div>
    </div>
  </form>
</div>