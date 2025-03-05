<?php
session_start();
if (isset($_SESSION['us'])&& $_SESSION['id'] != "") {
	//echo $_SESSION['us'];


 include("common/db.php");
?>
<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Bootstrap Dashboards" />
		<meta name="keywords"
			content="Layout, Admin, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Lobipanel, Drag &amp; Drop, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="img/favicon.svg" />
		<title>Best Admin Dashboards - Layout</title>

		<!--
			**********************
			**********************
			Common CSS files
			**********************
			**********************
		-->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />

		<!-- Icomoon Icons CSS -->
		<link rel="stylesheet" href="fonts/icomoon/icomoon.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="css/main.min.css" />

		<!-- Daterange CSS -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

	</head>

	<body>


		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">

			<!-- BEGIN .app-heading -->
            <?php include("common/header.php"); ?>
			<!-- END: .app-heading -->

			<!-- BEGIN .app-container -->
			<div class="app-container">

				<!-- BEGIN .app-side -->
				<?php include("common/slidebar.php"); ?>
                
				<!-- END: .app-side -->

				<!-- BEGIN .app-main -->
				<div class="app-main">

					<!-- BEGIN .main-heading -->
                    <header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="page-icon">
										<i class="icon-layers"></i>
									</div>
									<div class="page-title">
										<h3>Insert Notes</h3>
										<h6 class="sub-heading">Welcome to this site</h6>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="daterange-container">
										<div id="reportrange" class="form-control">
											<span></span> <i class="icon-chevron-down down-arrow"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->

					<!-- BEGIN .main-content -->
					<div class="main-content">
          <form action="ins.php" method="post" enctype="multipart/form-data">
       <!-- <p><label for="nac">Teacher Name</label></p> -->
        <p><input type="hidden" name="name" id="na" value="<?php echo $_SESSION['us']; ?>" placeholder="Enter the name"/></p>
		<p><input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>"></p>
        <p>Stream</p>

        <p><select name="str">
            <option value="">-Select-</option>
			<?php
			$str="SELECT * FROM stream";
			$q=$con->query($str);
			while ($row_1=$q->fetch_assoc()) {
				?>
                <option value="<?php echo $row_1['stream']; ?>"> <?php echo $row_1['stream']; ?> </option>
			<?php } ?>
            
        </select>
        </p>
        <p>Samester</p>
      <p><select name="sem" >
        <option value="">-Select-</option>
		<?php
			$sem="SELECT * FROM semester";
			$qu=$con->query($sem);
			while ($row_2=$qu->fetch_assoc()) {
				?>
                <option value="<?php echo $row_2['semester']; ?>"> <?php echo $row_2['semester']; ?> </option>
			<?php } ?>
      </select></p>
	  <p>Subject</p>
	  <p><select name="subject" >
        <option value="">-Select-</option>
		<?php
			$sem="SELECT * FROM subject";
			$qu=$con->query($sem);
			while ($row_3=$qu->fetch_assoc()) {
				?>
                <option value="<?php echo $row_3['subject']; ?>"> <?php echo $row_3['subject']; ?> </option>
			<?php } ?>
      </select></p>
      <p>Submission Date</p>
      <p><input type="date" name="date"/></p>
      <p>Uploded File</p>
      <p><input type="file" name="file"/></p>
      <p><input type="submit" name="submit" Value="Submit"></p>

    </form>


					</div>
					<!-- END: .main-content -->

					<!-- BEGIN .main-footer -->
					<?php include("common/footer.php"); ?>
					<!-- END: .main-footer -->

				</div>
				<!-- END: .app-main -->

			</div>
			<!-- END: .app-container -->

		</div>
		<!-- END: .app-wrap -->


		<!--
			**********************
			**********************
			Common JS files
			**********************
			**********************
		-->

		<!-- jQuery JS. -->
		<script src="js/jquery.js"></script>

		<!-- Tether Js, then other JS. -->
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="vendor/unifyMenu/unifyMenu.js"></script>
		<script src="vendor/onoffcanvas/onoffcanvas.js"></script>
		<script src="js/moment.js"></script>

		<!-- News Ticker JS -->
		<script src="vendor/newsticker/newsTicker.min.js"></script>
		<script src="vendor/newsticker/custom-newsTicker.js"></script>

		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange JS -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Common JS -->
		<script src="js/common.js"></script>

	</body>

</html>
<?php } 
else{
	header("location:../index.php");
}?>