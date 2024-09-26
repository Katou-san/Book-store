<?php
function notification($color, $title, $message)
{
  echo "<div class='toast'>
          <div class='toast-content'>
        <i class='fas fa-solid fa-check check'></i>
          <div class='message'>
          <span class='colortext'>" . $color . "</span>
        <span class='text text-1'>" . $title . "</span>
       <span class='text text-2'>" . $message . "</span>
      </div>
    </div>
    <i class='fa-solid fa-xmark close'></i>
    <div class='progress'></div>
    </div>
    ";
}


?>