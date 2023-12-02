<?php
session_start();
require './inc/header.php';

$editing = false;
$product = null;
if (isset($_GET['id'])) {
    $editing = true;

    require './inc/database.php';
    // set up query
    $sql = "SELECT * FROM content WHERE ID = " . $_GET['id'];

    // run the query and store the results
    $result = $conn->query($sql);
    foreach ($result as $item) {
        $product = $item;
    }
}
?>

  <main>
      <section class="signup">
          <h2>
          <?php
          if ($editing) {
              echo 'Edit item:';
          } else {
              echo 'Add new item:';
          }
          ?>
          </h2>
          <form name="content_form" action="display-content.php" method="post" enctype="multipart/form-data">
              <div class="container">
              <label for="name">Plant Name: </label>
              <input type="text" id="name" name="name" value="<?php if ($product) echo $product['name']; ?>" required>

              <label for="price">Price: </label>
              <input type="text" id="price" name="price" value="<?php if ($product) echo $product['price']; ?>" required>

              <label for="description">Description: </label>
              <input type="text" id="description" name="description" value="<?php if ($product) echo $product['description']; ?>" required>

              <label for="image">Image: </label>
              <input type='file' name='image' accept="image/png, image/jpeg" />

              <input type="hidden" name="ID" value="<?php if ($product) echo $product['ID']; ?>">
              <input name="submit" class="submit" type="submit" value="Save" />
              </div>
          </form>
      </section>
  </main>


<?php
require './inc/footer.php';
?>
