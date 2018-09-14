<?php

session_start();
if(isset($_SESSION['user_name'])){

}else{
header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IAH & VB</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<link href="../css/myBtn.css" rel="stylesheet">
<link href="css/jquery.dataTables.min.css" rel="stylesheet">
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script>

$(document).ready(function() {
$('#orders-table').DataTable( {
	"scrollX": true,
	"processing": true,
	"serverSide": true,
	"ajax": "tableData/pending_orders_table.php"
} );

$('#samples-table').DataTable( {
		"scrollX": true,
	"processing": true,
	"serverSide": true,
	"ajax": "tableData/pending_samples_table.php"
} );
} );

</script>
</head>

<body>
<nav class="navbar navbar-fixed-top" style="background-color:#4977d7" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="color:#fffff" href="#"><b><span style="color:#fffff"><img class="img img-responsive" style="width:50px;height:50px;display:inline" src="img/logo.png"></span> &nbsp;Institute of Animal Health &amp; Veterenary Biologicals </b></a>
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" style="margin-right:10px;" ><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>INBOX   <span class="badge">0</span></a>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION["user_name"];  ?> &nbsp;  <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>		
	</div><!-- /.container-fluid -->
</nav>
	
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form>
	<ul class="nav menu">
		<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
		<li><a href="inbox.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Inbox</a></li>
		<li><a href="orderEntry.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Entry</a></li>
		<li><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Orders History</a></li>
		<li ><a href="add_species.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Species</a></li>
		<li><a href="add_sampleType.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Sample Type</a></li>
		<li><a href="add_tests.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Tests</a></li>
		<li><a href="add_diseaseNames.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg> Disease</a></li>
		<li><a href="order_state.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Sample Results</a></li>
		<li><a href="print_receipt.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"></use></svg> Print Document/Statement</a></li>
	</ul>

</div><!--/.sidebar-->
	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php
							require('get_pending_orders.php');		
							
						?></div>
						<div class="text-muted">Pending Orders</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked hourglass"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php
							require('get_pending_samples.php');		
							
						?></div>
						<div class="text-muted">Pending Samples</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php
							require('get_orders_in_approval.php');		
							
						?></div>
						<div class="text-muted">Orders in approval</div>
					</div>
				</div>
			</div>
		</div>
		
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Pending Orders </div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						<table id="orders-table" class="display nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Owner Name</th>
								<th>Referral Name</th>
								<th>Application Date</th>
								<th>CM/Receipt Number</th>
								<th>State</th>
								<th>Place</th>
								<th>Owner Address</th>
								<th>Referral Address</th>
							</tr>
						</thead>
						
					</table>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Pending Samples </div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						<table id="samples-table" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Sample ID</th>
								<th>Order ID</th>
								<th>Accession</th>
								<th>Species</th>
								<th>Sample Type</th>
								<th>Animal Age</th>
								<th>Animal Sex</th>
								<th>Lab</th>
								<th>Animal History</th>
							</tr>
						</thead>
						
					</table>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
	
	<!--
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Orders stats </div>
				<div class="panel-body">
					<div class="canvas-wrapper">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	-->
							
	
</div>	<!--/.main-->



<script>
	$('#calendar').datepicker({
	});

	!function ($) {
		$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
			$(this).find('em:first').toggleClass("glyphicon-minus");      
		}); 
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>	
</body>

</html>
