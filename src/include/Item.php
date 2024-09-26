<?php
function Item($item)
{
  echo "<a href='#' class='swiper-slide box'>";
  echo "<div class='image'>";
  echo "<img src='../Upload/" . $item['Img'] . "' alt='' />";
  echo "</div><div class='content'>";
  echo "<h3>" . $item['Name_book'] . "</h3>";
  echo "  <div class='price'>" . $item['Price'] . "</div>";
  echo "     <div class='stars'>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star'></i>
                <i class='fas fa-star-half-alt'></i>
              </div>
            </div>  
          </a>";
}

function ItemBig($item)
{
  echo "<div class='swiper-slide box'>
    <div class='icons'>
      <a href='#' class='fas fa-search'></a>
      <a href='#' class='fas fa-heart'></a>
      <a href='#' class='fas fa-eye'></a>
    </div>";
  echo " <div class='image'>";
  echo "<img src='../Upload/" . $item['Img'] . "' alt=' '/>";
  echo "</div> <div class='content'>";
  echo "<h3>" . $item['Name_book'] . "</h3>";
  echo "<div class='price'>" . $item['Price'] . "<span>$20.99</span></div>
  <a class='btn' href='../View/Detail.php?page=detail&idD=" . $item['Product_id'] . "'>
  view detail</a>
  </div>
</div>";
}

function Itemlist($item)
{
  echo "<div class='ItemList'>";
  echo "<img src='../Upload/" . $item['Img'] . "' alt=' srcset='>";
  echo "<h3>" . $item['Name_book'] . "</h3>";
  echo " <div class='Price'>" . $item['Price'] . "</div>";
  echo "<div class='lBtnACrat' onclick=AddCart('" . $item['Product_id'] . "')>";
  echo "<a class='btnACrat' >Add cart</a>";
  echo "</div>";
  echo "<div class='lBtnACrat'>";
  echo "<a class='btnACrat' href='../View/Detail.php?page=detail&idD=" . $item['Product_id'] . "'>Detail</a>";
  echo "</div></div>";

}

function ItemSlider($item)
{
  echo "<div class='ItemBookS'>
  <div class='contentS'>";
  echo "<div class='NameBookS'>" . $item['Name_book'] . "</div>";
  echo "  <div class='ContentBookS'>" . $item['Description'] . "</div>";
  echo "    <div class='btnBookS'>
  <a class='btnACrat' href='../View/Detail.php?page=detail&idD=" . $item['Product_id'] . "'>
      <button type='button' class='btn'>view detail</button></a>
    </div>
  </div>
  <div class='bookImg'>";
  echo "<img src='../Upload/" . $item['Img'] . "' alt=' srcset='>";
  echo " </div>
</div>";
}

function ItemCart($Id, $num)
{
  echo "<div class=' layoutCart'>
      <input type='checkbox'>
      <div class='LIMGCart'>";
  echo " <img src='../Upload/book1701314467@Adrift@1701314467.jpeg' alt=''>";
  echo "</div> ";
  echo "<h3>" . $Id . "</h3>";
  echo "<h3> gia</h3>";
  echo "<h3>" . $num . "</h3>";
  echo "  </div>";
}
?>