<?php

function tableUser($row)
{
    echo "<tr>";
    echo "<th scope='row'>" . $row['User_id'] . "</th>";
    echo "<td>" . $row['Name_user'] . "</td>";
    echo "<td>" . $row["Email"] . "</td>";
    echo "<td>" . $row["Password"] . "</td>";
    echo "<td>" . $row["NumberPhone"] . "</td>";
    echo "<td class='btnOption'>";
    echo "<button onclick={toggleShowDeleteU('" . $row['User_id'] . "')} type='button' class='btn btn-outline-danger'>Remove</button>";
    echo "</td></tr>";
}

function tableCategory($row, $data)
{
    echo "<tr>";
    echo "<th scope='row'>" . $row['Category_id'] . "</th>";
    echo "<td>" . $row['Name_category'] . "</td>";
    echo "<td class='btnOption'>";
    echo "<button type='button' onclick={toggleShowEditC('" . $row['Category_id'] . "','" . $row['Name_category'] . "')} class='btn btn-outline-success'>Edit</button>";
    echo "<button type='button' onclick={toggleShowDeleteC('" . $row['Category_id'] . "','" . $row['Name_category'] . "')} class='btn btn-outline-danger'>Remove</button>";
    echo "</td></tr>";
}

function tableProduct($row)
{
    $namebook = $row['Name_book'];
    // var_dump($namebook);
    echo "<tr>";
    echo "<th scope='row'>" . $row['Product_id'] . "</th>";
    echo "<td>" . $row['Name_book'] . "</td>";
    echo "<td>" . $row["Category_id"] . "</td>";
    echo "<td><img src='../Upload/" . $row['Img'] . "' alt=' ' srcset=''></td>";
    echo "<td>" . $row["Description"] . "</td>";
    echo "<td>" . $row["Date"] . "</td>";
    echo "<td>" . $row["Price"] . "</td>";
    echo "<td>" . $row["Publishing"] . "</td>";
    echo "<td>" . $row["Author"] . "</td>";
    echo "<td>" . $row["SoldOut"] . "</td>";
    echo "<td class='btnOption'>";
    echo "<button type='button' onclick={toggleShowEditP('" . $row['Product_id'] . "')} class='btn btn-outline-success'>Edit</button> <span>  </span>";
    echo "<button type='button' onclick={toggleShowDeleteP('" . $row['Product_id'] . "')} class='btn btn-outline-danger'>Remove</button>";
    echo "</td></tr>";
}


function title($data)
{
    if ($data == "user") {
        echo "<th scope='col'>Id</th>
            <th scope='col'>Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Pass</th>
            <th scope='col'>Phone</th>";
    }
    if ($data == "category") {
        echo "<th scope='col'>Id Category</th>
            <th scope='col'>Name Category</th>";
    }
    if ($data == "product") {
        echo "<th scope='col'>Id Product</th>
            <th scope='col'>Name </th>
            <th scope='col'>Category</th>
            <th scope='col'>Img</th>
            <th scope='col'>Description</th>
            <th scope='col'>Date</th>
            <th scope='col'>Price</th>
            <th scope='col'>Publishing</th>
            <th scope='col'>Author</th>
            <th scope='col'>SoldOut</th>";
    }
}
?>