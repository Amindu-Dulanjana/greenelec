<?php

session_start();

$user = $_SESSION["u"];

require "connection.php";

$aray;

$search = $_POST["s"];
$age = $_POST["a"];
$qty = $_POST["q"];
$condition = $_POST["c"];

// echo $search;
// echo $age;
// echo $qty;
// echo $condition;








if(empty($search)  && empty($age) && empty($qty) && empty($condition)){
    

  echo "Please Select condition or title";

}else  if (empty($search) && empty($age) && empty($qty) && !empty($condition)){
    
  $prod =   Database :: search("SELECT * FROM `product` WHERE `condition_id` = '".$condition."'  ;");
  $nrows = $prod->num_rows;

  for($i = 0; $i < $nrows; $i++){
      $srow = $prod->fetch_assoc();

      ?>



<div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
<div class="row g-0">

    <?php

            $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
            $pir = $pimgrs->fetch_assoc();

            ?>

    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }



}else  if (empty($search) && empty($age) && !empty($qty) && empty($condition)){
    
if($qty == 1){

    $prod =   Database :: search("SELECT * FROM `product`  ORDER BY  `price`  ASC  ;");
    $nrows = $prod->num_rows;

  
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
        ?>
  
  
  
  <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
      <div class="col-md-4 mt-4">
          <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
              style="width:90%">
      </div>
      <div class="col-md-8">
          <div class="card-body">
              <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
              <span
                  class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
              <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                  Left</span><br>
  
              <!-- switch        -->
              <div class="form-check form-switch">
                  <input class="form-check-input shadow-none" type="checkbox"
                      role="switch" id="check"
                      onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                          if ($srow["status_id"] == 2) {
                                                                          ?>checked<?php
                                                                          } ?> />
                  <label class="form-check-label text-info fw-bold" for="check"
                      id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                              if ($srow["status_id"] == 2) {
  
                                                                              echo "Make Your Product Active";
                                                                              } else {
                                                                              echo "Make Your Product Deactive";
                                                                              }
                                                                              ?></label>
              </div>
              <!-- swich close -->
              <div class="row">
                  <div class="col-12">
                      <div class="row">
                          <div class="col-md-6 d-grid g-1">
                              <a href="#" class="btn btn-success shadow-none"
                                  onclick="sendId(<?php echo $srow['id']; ?>);">
                                  Update</a>
                          </div>
                          <div class="col-md-6 d-grid g-1">
                              <a href="#" class="btn btn-danger shadow-none"
                                  onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  
        <?php
  
    }
  

}else{
      
  $prod =   Database :: search("SELECT * FROM `product`  ORDER BY  `price`  DESC  ;");
  $nrows = $prod->num_rows;

  for($i = 0; $i < $nrows; $i++){
      $srow = $prod->fetch_assoc();

      ?>



<div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
<div class="row g-0">

    <?php

            $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
            $pir = $pimgrs->fetch_assoc();

            ?>

    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }
}
    




}else  if (empty($search) && !empty($age) && empty($qty) && empty($condition)){
    

    if($age ==1 ){
        $prod =   Database :: search("SELECT * FROM `product`  ORDER BY  `datetime_added`  ASC  ;");
        $nrows = $prod->num_rows;
      
        for($i = 0; $i < $nrows; $i++){
            $srow = $prod->fetch_assoc();
      
            ?>
      
      
      
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
      <div class="row g-0">
      
          <?php
      
                  $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
                  $pir = $pimgrs->fetch_assoc();
      
                  ?>
      
          <div class="col-md-4 mt-4">
              <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
                  style="width:90%">
          </div>
          <div class="col-md-8">
              <div class="card-body">
                  <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
                  <span
                      class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
                  <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                      Left</span><br>
      
                  <!-- switch        -->
                  <div class="form-check form-switch">
                      <input class="form-check-input shadow-none" type="checkbox"
                          role="switch" id="check"
                          onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                              if ($srow["status_id"] == 2) {
                                                                              ?>checked<?php
                                                                              } ?> />
                      <label class="form-check-label text-info fw-bold" for="check"
                          id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                                  if ($srow["status_id"] == 2) {
      
                                                                                  echo "Make Your Product Active";
                                                                                  } else {
                                                                                  echo "Make Your Product Deactive";
                                                                                  }
                                                                                  ?></label>
                  </div>
                  <!-- swich close -->
                  <div class="row">
                      <div class="col-12">
                          <div class="row">
                              <div class="col-md-6 d-grid g-1">
                                  <a href="#" class="btn btn-success shadow-none"
                                      onclick="sendId(<?php echo $srow['id']; ?>);">
                                      Update</a>
                              </div>
                              <div class="col-md-6 d-grid g-1">
                                  <a href="#" class="btn btn-danger shadow-none"
                                      onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
      
            <?php
      
        }
        
    }else{

    $prod =   Database :: search("SELECT * FROM `product`  ORDER BY  `datetime_added`  DESC  ;");
    $nrows = $prod->num_rows;
  
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
        ?>
  
  
  
  <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
      <div class="col-md-4 mt-4">
          <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
              style="width:90%">
      </div>
      <div class="col-md-8">
          <div class="card-body">
              <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
              <span
                  class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
              <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                  Left</span><br>
  
              <!-- switch        -->
              <div class="form-check form-switch">
                  <input class="form-check-input shadow-none" type="checkbox"
                      role="switch" id="check"
                      onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                          if ($srow["status_id"] == 2) {
                                                                          ?>checked<?php
                                                                          } ?> />
                  <label class="form-check-label text-info fw-bold" for="check"
                      id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                              if ($srow["status_id"] == 2) {
  
                                                                              echo "Make Your Product Active";
                                                                              } else {
                                                                              echo "Make Your Product Deactive";
                                                                              }
                                                                              ?></label>
              </div>
              <!-- swich close -->
              <div class="row">
                  <div class="col-12">
                      <div class="row">
                          <div class="col-md-6 d-grid g-1">
                              <a href="#" class="btn btn-success shadow-none"
                                  onclick="sendId(<?php echo $srow['id']; ?>);">
                                  Update</a>
                          </div>
                          <div class="col-md-6 d-grid g-1">
                              <a href="#" class="btn btn-danger shadow-none"
                                  onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  
        <?php
  
    }
}


}else  if (!empty($search) && empty($age) && empty($qty) && empty($condition)){

    $prod =   Database :: search("SELECT * FROM `product`  WHERE `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%';");
    $nrows = $prod->num_rows;
  
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
        ?>
  
  
  
  <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
      <div class="col-md-4 mt-4">
          <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
              style="width:90%">
      </div>
      <div class="col-md-8">
          <div class="card-body">
              <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
              <span
                  class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
              <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                  Left</span><br>
  
              <!-- switch        -->
              <div class="form-check form-switch">
                  <input class="form-check-input shadow-none" type="checkbox"
                      role="switch" id="check"
                      onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                          if ($srow["status_id"] == 2) {
                                                                          ?>checked<?php
                                                                          } ?> />
                  <label class="form-check-label text-info fw-bold" for="check"
                      id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                              if ($srow["status_id"] == 2) {
  
                                                                              echo "Make Your Product Active";
                                                                              } else {
                                                                              echo "Make Your Product Deactive";
                                                                              }
                                                                              ?></label>
              </div>
              <!-- swich close -->
              <div class="row">
                  <div class="col-12">
                      <div class="row">
                          <div class="col-md-6 d-grid g-1">
                              <a href="#" class="btn btn-success shadow-none"
                                  onclick="sendId(<?php echo $srow['id']; ?>);">
                                  Update</a>
                          </div>
                          <div class="col-md-6 d-grid g-1">
                              <a href="#" class="btn btn-danger shadow-none"
                                  onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  
        <?php
  
    }


}else  if (empty($search) && empty($age) && !empty($qty) && !empty($condition)){
   

    if($qty == 1){
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$qty."' ORDER BY `price` ASC ;");
        $nrows = $prod->num_rows;



    }else{
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$qty."' ORDER BY `price` DESC ;");
        $nrows = $prod->num_rows;
    }
  
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
    ?>
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }



}else  if (empty($search) && !empty($age) && !empty($qty) && empty($condition)){
    
    if($qty == 1){
        $prod =   Database :: search("SELECT * FROM `product`   ORDER BY `price` ASC ;");
        $nrows = $prod->num_rows;



    }else{
        $prod =   Database :: search("SELECT * FROM `product`   ORDER BY `price` DESC ;");
        $nrows = $prod->num_rows;
    }
  

    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
    ?>
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }



}else  if (!empty($search) && !empty($age) && empty($qty) && empty($condition)){

    
    if($age == 1){
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%' ORDER BY `datetime_added` ASC ;");
        $nrows = $prod->num_rows;



    }else{
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%'ORDER BY `datetime_added` DESC ;");
        $nrows = $prod->num_rows;
    }
  
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
    ?>
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }



}else  if (empty($search) && !empty($age) && empty($qty) && !empty($condition)){

      
    if($age == 1){
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."' ORDER BY `datetime_added` ASC ;");
        $nrows = $prod->num_rows;



    }else{
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."'  ORDER BY `datetime_added` DESC ;");
        $nrows = $prod->num_rows;
    }

    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
    ?>
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }


}else  if (!empty($search) && empty($age) && !empty($qty) && empty($condition)){

    if($qty == 1){
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%' ORDER BY `price` ASC ;");
        $nrows = $prod->num_rows;



    }else{
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%'  ORDER BY `price` DESC ;");
        $nrows = $prod->num_rows;
    }

   
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
    ?>
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }


}else  if (empty($search) && !empty($age) && !empty($qty) && !empty($condition)){

    if($qty == 1){

        
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."'  ORDER BY `price` ASC ;");
        $nrows = $prod->num_rows;



    }else{
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."'   ORDER BY `price` DESC ;");
        $nrows = $prod->num_rows;
    }


    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
    ?>
    <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }


}else  if (!empty($search) && empty($age) && !empty($qty) && !empty($condition)){

    if($qty == 1){

        
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."' AND  `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%'  ORDER BY `price` ASC ;");
        $nrows = $prod->num_rows;



    }else{
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."' AND  `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%'  ORDER BY `price` DESC ;");
        $nrows = $prod->num_rows;
    }

 
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
    ?>
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }

}else  if (!empty($search) && !empty($age) && !empty($qty) && !empty($condition)){
    
    if($age ==1 ){
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."' AND  `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%'  ORDER BY `datetime_added` ASC ;");
        $nrows = $prod->num_rows;
        
    }else{
        $prod =   Database :: search("SELECT * FROM `product`  WHERE `condition_id` = '".$condition."' AND  `title` LIKE '%".$search."%' OR `description` LIKE '%".$search."%'  ORDER BY `datetime_added` DESC ;");
        $nrows = $prod->num_rows;
    }
  
    for($i = 0; $i < $nrows; $i++){
        $srow = $prod->fetch_assoc();
  
    ?>
      <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
  <div class="row g-0">
  
      <?php
  
              $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
              $pir = $pimgrs->fetch_assoc();
  
              ?>
  
  
    <div class="col-md-4 mt-4">
        <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
            style="width:90%">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
            <span
                class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
            <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                Left</span><br>

            <!-- switch        -->
            <div class="form-check form-switch">
                <input class="form-check-input shadow-none" type="checkbox"
                    role="switch" id="check"
                    onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                        if ($srow["status_id"] == 2) {
                                                                        ?>checked<?php
                                                                        } ?> />
                <label class="form-check-label text-info fw-bold" for="check"
                    id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                            if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                            } else {
                                                                            echo "Make Your Product Deactive";
                                                                            }
                                                                            ?></label>
            </div>
            <!-- swich close -->
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-success shadow-none"
                                onclick="sendId(<?php echo $srow['id']; ?>);">
                                Update</a>
                        </div>
                        <div class="col-md-6 d-grid g-1">
                            <a href="#" class="btn btn-danger shadow-none"
                                onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

      <?php

  }

}






