<?php
// include('./includes/conn.php');


function displayall()
{

    global $conn;
    if (!isset($_GET['cat_id']) && !isset($_GET['search'])) {
        $sql = "SELECT * FROM course order by rand() limit 0,6";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='courses'>
             <a href='course-inner.php?c_id=$row[c_id]'>
                    <img src='./admin/c_images/$row[c_image]'>
                    <div class='details'>
                        <span>Updated $row[c_date]</span>
                        <h6>$row[c_name]</h6>
                        <h5>Rs.$row[c_price]/-</h5>
                        <div class='star'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='far fa-star'></i>
                        </div>
                    </div> </a>
                    <div class='cost' style='' >
  <a href='index.php?c_id=$row[c_id]' style='text-decoration:none; color:#fff;text-align:center;'>Add to cart</a>
                    </div>
                    </div>";
        }
    }
}

function display_cat()
{
    global $conn;
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
        $sql = "SELECT * FROM course WHERE c_cat = $cat_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='courses'>
             <a href='course-inner.php?c_id=$row[c_id]'>
                    <img src='./admin/c_images/$row[c_image]'>
                    <div class='details'>
                        <span>Updated $row[c_date]</span>
                        <h6>$row[c_name]</h6>
                        <h5>Rs.$row[c_price]/-</h5>
                        <div class='star'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='far fa-star'></i>
                        </div>
                    </div> </a>
                    <div class='cost' style='' >
  <a href='index.php?c_id=$row[c_id]' style='text-decoration:none; color:#fff;text-align:center;'>Add to cart</a>
                    </div>
                    </div>";


        }
    }
}
function search_course()
{
    global $conn;
    if (isset($_GET['search-btn'])) {
        if (isset($_GET['search'])) {
            $search_val = $_GET['search'];
            $sql = "SELECT * FROM course WHERE c_name LIKE '%$search_val%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo "<h1>Sorry! course is not yet uploaded</h1>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='courses'>
                     <a href='course-inner.php?c_id=$row[c_id]'>
                            <img src='./admin/c_images/$row[c_image]'>
                            <div class='details'>
                                <span>Updated $row[c_date]</span>
                                <h6>$row[c_name]</h6>
                                <h5>Rs.$row[c_price]/-</h5>
                                <div class='star'>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='far fa-star'></i>
                                </div>
                            </div> </a>
                            <div class='cost' style='' >
          <a href='index.php?c_id=$row[c_id]' style='text-decoration:none; color:#fff;text-align:center;'>Add to cart</a>
                            </div>
                            </div>";

                }
            }
        }
    }
}

function displayall_courses()
{

    global $conn;
    if (!isset($_GET['cat_id']) && !isset($_GET['search'])) {
        $sql = "SELECT * FROM course order by rand() limit 0,12";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='courses'>
             <a href='course-inner.php?c_id=$row[c_id]'>
                    <img src='./admin/c_images/$row[c_image]'>
                    <div class='details'>
                        <span>Updated $row[c_date]</span>
                        <h6>$row[c_name]</h6>
                        <h5>Rs.$row[c_price]/-</h5>
                        <div class='star'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='far fa-star'></i>
                        </div>
                    </div> </a>
                    <div class='cost' style='' >
  <a href='course.php?c_id=$row[c_id]' style='text-decoration:none; color:#fff;text-align:center;'>Add to cart</a>
                    </div>
                    </div>";
        }
    }
}
// function course_details()
// {
//     global $conn;

//         }
//     }
// }

// id address of user
// function get_ip()
// {
//     //whether ip is from the share internet  
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     }
//     //whether ip is from the proxy  
//     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }
//     //whether ip is from the remote address  
//     else {
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     return $ip;
// }
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;

// add to cart 
function add_to_cart()
{
    global $conn;
    // check wheter it is active
    if (isset($_GET['c_id'])) {
        $c_id = $_GET['c_id'];
        // $ip_addr = get_ip();
        $user_id = $_SESSION['user_id'];

        $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id' AND c_id = '$c_id'");

        if (mysqli_num_rows($result) > 0) {
            echo '<script>window.addEventListener("load",function () {
                swal("Not added!", "Course already present in cart", "warning").then((value) => { window.location.href = "index.php"; });
            });</script>';
        } else {
            $result2 = mysqli_query($conn, "INSERT INTO `cart` (c_id,user_id) VALUES ('$c_id','$user_id')");
            echo '<script>window.addEventListener("load",function () {
                swal("Done", "Course added in cart.", "success").then((value) => { window.location.href = "index.php"; });
            });</script>';
        }
    }
}
// add to cart on course page
function add_to_cartc()
{
    global $conn;
    // check wheter it is active
    if (isset($_GET['c_id'])) {
        $c_id = $_GET['c_id'];
        // $ip_addr = get_ip();
        $user_id = $_SESSION['user_id'];

        $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id' AND c_id = '$c_id'");

        if (mysqli_num_rows($result) > 0) {
            echo '<script>window.addEventListener("load",function () {
                swal("Not added!", "Course already present in cart", "warning").then((value) => { window.location.href = "course.php"; });
            });</script>';
        } else {
            $result2 = mysqli_query($conn, "INSERT INTO `cart` (c_id,user_id) VALUES ('$c_id','$user_id')");
            echo '<script>window.addEventListener("load",function () {
                swal("Done", "Course added in cart", "success").then((value) => { window.location.href = "course.php"; });
            });</script>';
        }
    }
}

// course count
function course_count()
{
    global $conn;
    $user_id = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'");
    $count = mysqli_num_rows($result);
    echo $count;

}
function cart_total()
{
    global $conn;

    // $ip_addr = get_ip();
    $user_id = $_SESSION['user_id'];
    $total = 0;
    $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'");
    while ($row = mysqli_fetch_array($result)) {
        $c_id = $row['c_id'];

        $result2 = mysqli_query($conn, "SELECT * FROM `course` WHERE c_id='$c_id'");

        while ($row2 = mysqli_fetch_array($result2)) {
            $c_price = array($row2['c_price']);
            $c_value = array_sum($c_price);
            $total += $c_value;
        }

    }
    echo $total;
}

// function cart_course()
// {
//     global $conn;

//     $ip_addr = get_ip();
//     $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE ip_addr = '$ip_addr'");
//     while ($row = mysqli_fetch_array($result)) {
//         $c_id = $row['c_id'];

//         $result2 = mysqli_query($conn, "SELECT * FROM `course` WHERE c_id='$c_id'");

//         while ($row2 = mysqli_fetch_array($result2)) {

//          echo"   <li>
//                     <div class='txt'><img src='./admin/c_images/$row2[c_image]' /></div>
//                     <div class='txt'>$row2[c_name]</div>
//                     <div class='txt'>Rs. $row2[c_price]/-</div>
//                     <div class='txt'>
//                         Remove <i class='fa-solid fa-circle-minus'></i>
//                     </div>
//                 </li>
//             ";

//         }

//     }
// }

// function remove_course()
// {
//     global $conn;
//     if(isset($_POST['submit']))
//     {
//         $remove = $_POST['remove'];
//         foreach($remove as $remove)
//         {
//             $result = mysqli_query($conn,"DELETE * FROM `cart` WHERE c_id = $remove[c_id]");
//         }
//     }
// }

// user image
function user_image()
{
    global $conn;
    $r = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = $_SESSION[user_id] ");
    $row = mysqli_fetch_assoc($r);
    return $row['user_image'];
}
?>