<?php
function detailItem($item)
{
  echo "<div class='wrapper'>
    <div class='product-img'>";
  echo "<img src='../Upload/" . $item['Img'] . "' height='420' width='327' />";
  echo "</div>
    <div class='product-info'>
      <div class='product-text'>";
  echo "<h1>" . $item['Name_book'] . "</h1>";
  echo "<h2>" . $item['Author'] . "</h2>";
  echo "<h2>" . $item['Publishing'] . "</h2>";
  echo "<p>" . $item['Description'] . "</p>";
  echo "</div>
      <div class='product-price-btn'  >";
  echo "<div class='priceDetail'>" . $item['Price'] . "   vnd</div>";
  echo "    <button  onclick={AddCart('" . $item['Product_id'] . "')}>buy now</button>
      </div>
    </div>
  </div>";
}
?>