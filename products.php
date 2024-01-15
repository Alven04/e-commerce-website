<?php
  require_once 'auth_check.php';
  include_once 'products_crud.php';
  include_once 'access_rights.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>American Football Equipment and Supplies : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Product</h2>
        </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
            <input name="pid" class="form-control" id="productid" placeholder="Product ID" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
          </div>
      </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <input name="name" class="form-control" id="productname" placeholder="Product Name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
          </div>
      </div>
      <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
            <input name="price" class="form-control" id="productprice" placeholder="Product Price" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>
          </div>
      </div>
      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
            <select name="type" class="form-control" id="producttype" required>
              <option value="Equipment" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Equipment") echo "selected"; ?>>Equipment</option>
              <option value="Supplies" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Supplies") echo "selected"; ?>>Supplies</option>
            </select>
          </div>
      </div>
      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
            <input name="brand" class="form-control" id="productbrand" placeholder="Product Brand" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_brand']; ?>" required>
          </div>
      </div>
      <div class="form-group">
          <label for="productweight" class="col-sm-3 control-label">Weight</label>
          <div class="col-sm-9">
            <input name="weight" class="form-control" id="productweight" placeholder="Product Weight" type="number" step=0.01 min="0" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_weight']; ?>" required>
          </div>
      </div>
      <div class="form-group">
          <label for="productrating" class="col-sm-3 control-label">Rating</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="procutrating" placeholder="Product Rating" name="rating" step="0.1" min="0" max="5" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_rating']; ?>" required>
          </div>
      </div>
      <div class="form-group">
          <label for="productquantity" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
            <input name="quantity" class="form-control" id="productquantity" placeholder="Product Quantity" type="number" step="1" min="0" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>" required>
          </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create" <?php echo ($_SESSION['access'] === 'N') ? 'disabled' : ''; ?>><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>

    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Type</th>
          <th>Brand</th>
          <th>Weight</th>
          <th>Rating</th>
          <th>Quantity</th>
        </tr>
       <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a186683_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td class="product_id"><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_weight']; ?></td>
        <td><?php echo $readrow['fld_product_rating']; ?></td>
        <td><?php echo $readrow['fld_product_quantity']; ?></td>
        <td>

          <a href="#" class="btn btn-warning btn-xs detail_btn" role="button">Details</a>

          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button" <?php echo ($_SESSION['access'] === 'N') ? 'disabled' : ''; ?>>Edit</a>
          
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button" <?php echo ($_SESSION['access'] === 'N') ? 'disabled' : ''; ?>>Delete</a>
          
  
        </td>
      </tr>
      
<div class="modal fade" id="viewdataModal" tabindex="-1" aria-labelledby="viewdataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3" id="exampleModalLabel">Product Details</h1>
      </div>
      <div class="modal-body">
        <div class="view_data">
          
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

      <?php
      }
      $conn = null;
      ?>
    </table>
  </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a186683_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    jQuery(document).ready(function() {
        $('.detail_btn').click(function(e) {
            e.preventDefault();
            var productid = $(this).closest('tr').find('.product_id').text();
            console.log(productid);
            $.ajax({
                url: 'products_details.php',
                method: 'POST',
                data: {'click_detail_btn': true, 'productid': productid},
                success: function(response) {
                    $('.view_data').html(response);
                    $("#viewdataModal").modal({ 
                      backdrop: "static", 
                      keyboard: false, 
                  });
                    $('#viewdataModal').modal('show');
                    
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

          
        });
    });
</script>

