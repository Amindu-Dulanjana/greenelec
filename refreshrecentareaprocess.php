<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $mail = $_SESSION["u"]["email"];

    $chatrs = Database::search("SELECT * FROM `chat` WHERE `from`  IN ('" . $mail . "') ORDER BY `date` DESC LIMIT 1");
    $n = $chatrs->num_rows;

    for ($x = 0; $x < $n; $x++) {

        $r = $chatrs->fetch_assoc();
        
        

        $imagers = Database::search("SELECT * FROM `profile_img` WHERE  `user_email` ='".$mail."' ;");
        $results = $imagers->fetch_assoc();
?>
        <a class="list-group-item list-group-item-action active text-white rounded-0">
            <div class="media">
                <img src="<?php echo  $results["code"]; ?>" alt="user" width="50" class="rounded-circle">
                <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0"><?php echo $r["from"]; ?></h6><small class="small font-weight-bold">01-10</small>
                    </div>
                    <p class="font-italic mb-0 text-small"><?php echo $r["content"]; ?></p>
                </div>
            </div>
        </a>

<?php

    }
}

?>