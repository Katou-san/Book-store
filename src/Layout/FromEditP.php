<div class="EditFormP ">
  <form class="container-fluid" action="../Controller/AdminController.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <div class="headerEditC">
        <h2>Edit Product</h2>
        <svg onclick="toggleShowEditP()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
          class="bi bi-x-lg" viewBox="0 0 16 16">
          <path
            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
      </div>

      <div class="InputFromP mt-10">
        <div>
          <label for="IIdProductA">Id Product</label>
          <input type="text" class="form-control" id="IdEditP" placeholder="Id" name="IdEditP" value="" />
        </div>
        <?php
        $NameP = "";
        $IMG = "";
        $Category = "";
        $Price = "";
        $Author = "";
        $Publishing = "";
        // var_dump($_POST["IdEditP"]);
        // if($_POST["IdEditP"] != "") {
        //   $Product = new Product();
        //   $Product->selectProductID();
        //   var_dump($Product);
        // }
        ?>
        <div>
          <label class="lableInput" for="exampleInputEmail1">Name book</label>
          <input type="text" class="form-control" id="NameEditP" placeholder="Name" name="NameEditP" />
        </div>
      </div>
      <label class="lableInput mt-10" for="">Image</label>
      <input type="file" class="form-control" id="ImgEditP" placeholder="img" name="ImgEditP" accept="image/*" />

      <div class="layoutSelect mt-10">
        <label class="lableInput" for="exampleInputEmail1">Category</label>
        <select name="CategoryEid" class=" mt-10">
          <?php
          include("../Util/connectDB.php");
          $stmt = $pdo->prepare("SELECT * FROM category");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $row['Category_id'] . ">" . $row['Name_category'] . "</option>";
          }
          ?>
        </select>
      </div>

      <label class="lableInput mt-10" for="IPriceProductA">Price</label>
      <input type="number" class="form-control" placeholder="Price" name="PriceEditP" />
      <div class="InputFromP mt-10">
        <div>
          <label for="IIdProductA">Author</label>
          <input type="text" class="form-control" placeholder="Author" name="AuthorEditP" value="" />
        </div>
        <div>
          <label class="lableInput">Publishing</label>
          <input type="text" class="form-control" placeholder="Publishing" name="PublishingEditP" />
        </div>
      </div>
      <textarea class="mt-10" name="DescriptionEditP"></textarea>
      <div class="layoutbtn">
        <input class="btn btn-outline-success btnSubmitEdit" name="btnSubmitEditP" type="submit" value="Submit">
      </div>
    </div>
  </form>
</div>