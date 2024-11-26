<?php
// get item card
function getItemCard($con, $itemSelectQuery)
{
  // execute query and store result
  $itemResult = mysqli_query($con, $itemSelectQuery);
  if (mysqli_num_rows($itemResult) > 0) {
    // fetch item details
    while ($itemRow = mysqli_fetch_assoc($itemResult)) {
      $item_discount = (float)$itemRow['item_discount'];
      $item_sell_price = (float)$itemRow['item_sell_price'];

      $discountedPrice = $item_sell_price * (100 - $item_discount) / 100; // discount claculation
      // show discount if item has discount
      if ($item_discount == 0) {
        $displayNone = 'd-none'; // apply bootstrap d-none class
      } else {
        $displayNone = ''; // remove bootstrap d-none class
      }

      // item availabiity status handling
      if ($itemRow['item_stock_qty'] == '0') {
        $availabiliy = 'Out of Stock';
        $AvailabiliyColor = 'text-danger'; // apply bootstrap class
      } else {
        $availabiliy = 'In Stock';
        $AvailabiliyColor = 'text-success'; // apply bootstrap class
      } ?>

      <!-- display item card -->
      <div class="col-sm-6 col-md-4 col-lg-3 text-center mb-4">
        <div class="card border-0 bg-light">
          <img src="images/products/<?= $itemRow['item_image1'] ?>" class="card-img-top p-2 position-relative" alt="<?= $itemRow['item_name'] ?>">
          <!-- item discount percentage-->
          <span class="<?= $displayNone ?> position-absolute top-0 start-0 rounded-end-pill badge bg-success p-2">
            -<?= $item_discount ?>%
          </span>
          <div class="card-body p-0 pb-2">
            <div class="tool-tip">
              <span class="tool-tip-text"><?= $itemRow['item_name'] ?></span>
              <h6 class="product-name"> <?= $itemRow['item_name'] ?></h6>
            </div>
            <!-- item prices-->
            <h6 class="<?= $displayNone ?> text-decoration-line-through d-inline text-body-tertiary">Rs. <?= number_format($item_sell_price, 2) ?></h6>
            <h6 class="<?= $displayNone ?> d-inline">Rs. <?= number_format($discountedPrice, 2) ?></h6>
            <!-- item availability -->
            <h6 class="<?= $AvailabiliyColor ?> fw-bold "><?= $availabiliy ?></h6>
            <a href="product-view.php?productId=<?= $itemRow['item_id'] ?>" class="btn btn-outline-warning btn-view btn-sm">View</a>
          </div>
        </div>
      </div>
<?php }
  } else {
    echo "<h2>Not available products</h2>";
  }
}

// get no of item in cart
function getNoOfCartItem($con)
{
  $cartSelectQuery = "SELECT * FROM cart WHERE fk_cust_id={$_SESSION['custId']}";
  $cartResult = mysqli_query($con, $cartSelectQuery);
  return mysqli_num_rows($cartResult);
}

// update cart item
function updateCartItem($con, $cart_id, $item_id, $existCartItemQty,  $existItemStockQty)
{
  if (isset($_POST['updateCartItem' . $cart_id])) {
    $updatedCartItemQty = (int)$_POST['cartQty'];

    if ($updatedCartItemQty != $existCartItemQty) {
      // update quantity in user cart
      $cartUpdateQuery = "UPDATE cart SET cart_item_qty=$updatedCartItemQty WHERE cart_id=$cart_id";
      if (mysqli_query($con, $cartUpdateQuery)) {
        // update item stock quantity
        $updatedItemStockQty = 0;
        if ($updatedCartItemQty > $existCartItemQty) {
          // remove adding cart items from item stock
          $updatedItemStockQty = $existItemStockQty - ($updatedCartItemQty - $existCartItemQty);
        } else {
          // add removing item to item stock
          $updatedItemStockQty = $existItemStockQty + ($existCartItemQty - $updatedCartItemQty);
        }
        $itemUpdateQuery = "UPDATE item SET item_stock_qty=$updatedItemStockQty WHERE item_id=$item_id";
        if (mysqli_query($con, $itemUpdateQuery)) {
          echo "<script>alert('Updated successfully');</script>";
          echo "<script>window.open('cart.php', '_self');</script>";
          exit();
        }
      }
    }
  }
}

// remove cart item
function removeCartItem($con, $cart_id, $item_id, $existCartItemQty,  $existItemStockQty)
{
  if (isset($_POST['removeCartItem' . $cart_id])) {
    //delete cart item from cart
    $cartDeleteQuery = "DELETE FROM cart WHERE cart_id=$cart_id";
    if (mysqli_query($con, $cartDeleteQuery)) {
      // add delete item to stock
      $updatedItemStockQty = $existItemStockQty + $existCartItemQty;
      $itemUpdateQuery = "UPDATE item SET item_stock_qty=$updatedItemStockQty WHERE item_id=$item_id";
      if (mysqli_query($con, $itemUpdateQuery)) {
        echo "<script>alert('Delete item from cart successfully');</script>";
        echo "<script>window.open('cart.php', '_self');</script>";
      }
    }
  }
}
