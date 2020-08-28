<?php

$servername = "localhost";
$username = "anutorn";
$password = "pobo8888";
$dbname = "concert";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM seat";
$result = $conn->query($sql);


$conn->close();
//--------------------
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
    case 'unsetTaken':
        unsetTaken();
        break;
    case 'setTaken':
        setTaken();
        break;
    case 'show':
        show();
        break;
    case 'adminShow':
        adminShow();
        break;
    case 'writeFile':
        writeFile();
        break;
    case 'readNewFile':
        readNewFile();
        break;
    }
}

function show() {
    //  A1 A2 A3
    //  B1 B2 B3
    //  print seat id and check box to html from database
    global $result;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $is_taken = $row["is_taken"];
            //echo "id: " . $id. " - is_taken: " . $is_taken. " - ";
            if ($is_taken === "1") {
                echo $id. "  <input checked type='checkbox' id='".$id."' onclick='return false'>";
            }
            else {
                echo sprintf("%s <input type='checkbox' name='box' select='0'
                    id='%s' onclick='set_select(this)'>",$id,$id);
            }
            // break line if seat ends with 3
            if (strpos($id,"3")>0) {
                echo "<br>";
            }
        }
    } else {
        echo "0 results";
    }
}

function adminShow() {
    global $result;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $is_taken = $row["is_taken"];
            //echo "id: " . $id. " - is_taken: " . $is_taken. " - ";
            if ($is_taken === "1") {
                echo $id. "  <input checked type='checkbox' id='".$id."'>";
            }
            else {
                echo $id. "  <input type='checkbox' id='".$id."'>";
            }
            // break line if seat ends with 3
            if (strpos($id,"3")>0) {
                echo "<br>";
            }
        }
    } else {
        echo "0 results";
    }
}
function setTaken() {
    $id = $_POST['id'];
    global $servername;
    global $username;
    global $password;
    global $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = sprintf('UPDATE seat SET is_taken = 1 WHERE id = "%s"',$id);
    $conn->query($sql);
    $conn->close();
}
function unsetTaken() {
    $id = $_POST['id'];
    global $servername;
    global $username;
    global $password;
    global $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = sprintf('UPDATE seat SET is_taken = 0 WHERE id = "%s"',$id);
    $conn->query($sql);
    $conn->close();
}

function writeFile() {
    // write txt file for result.html

    $waifu = $_POST['text'];
    $price = 1000;
    $seats = $_POST['seat_id'];

    $total_seat = count($seats);
    $total_price = $price * (int)$total_seat;
    $chosen_seat_text = "";
    // put seat array into string
    // remove comma if print last seat id
    for ($x = 0; $x < $total_seat; $x++) {
        //$chosen_seat_text .= sprintf("%s",$x);
        if ($x === $total_seat-1){
            $chosen_seat_text .= sprintf("%s",$seats[$x]);
        }
        else {
            $chosen_seat_text .= sprintf("%s, ",$seats[$x]);
        }
    }
    $text = sprintf("
%s\n
number of seat: %s\n
Total price: %s"
        ,$chosen_seat_text,$total_seat,$total_price);
    $myFile = fopen("newfile.txt","w") or die("Unable to open file!");
    fwrite($myFile,$text);
    fclose($myFile);
}

function readNewFile() {
    // my waifu <3
    $aira = "https://cdn.donmai.us/original/d2/a8/__isla_plastic_memories_drawn
        _by_huwali_dnwls3010__d2a8299072ed953f6fb5bf43c5d96289.jpg";
    // read newfile.txt for result page
    $myfile = fopen("newfile.txt", "r");
    // Output one line until end-of-file
    while(!feof($myfile)) {
        echo fgets($myfile) . "<br>";
    }
    fclose($myfile);
    echo printf("<img src='%s'><br>",$aira);
}
?>
