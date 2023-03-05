<?php
// Basic Files
include("../craftholic/Includes/config.php");
include("../craftholic/Includes/Connection.php");

// Mailer
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require("PHP Mailer/Exception.php");
require("PHP Mailer/PHPMailer.php");
require("PHP Mailer/SMTP.php");

if (isset($_POST['home'])) {
	// Email
	if (isset($_GET['Invoice'])) {
		$Order_Name = $_GET['Invoice'];

		// // Order Query
		$Query = "SELECT * FROM `shippingaddress` WHERE `Name` = '$Order_Name'";
		$Result = mysqli_query($conn, $Query);
		// Fetch Deta
		$Row = mysqli_fetch_assoc($Result);

		$Invoice = $Row['sa_id'];
		$Total_Name = $Row['Totalproducts'];
		$TotalPrice = $Row['TotalPrice'];
		$Date = $Row['Date'];
		$name = $Row['Name'];
		$Email = $Row['Email'];
		$Flat = $Row['Flat'];
		$Street = $Row['Street'];
		$Number = $Row['Number'];
		$City = $Row['City'];
		$State = $Row['State'];
		$Pincode = $Row['Pincode'];
		$Country = $Row['Country'];
		$Placed = "Your Order #" . $Invoice . " has been placed successfully";

		$mail = new PHPMailer(true);

		try {
			//Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
			$mail->isSMTP();                                           //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                 //Enable SMTP authentication
			$mail->Username   = 'juhilbhardiya161200@gmail.com';      //SMTP username
			$mail->Password   = 'efqzbhjyawoxzqie';                   //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable implicit TLS encryption
			$mail->Port       = 465;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('juhilbhardiya161200@gmail.com', 'CRAFTHOLIC');
			$mail->addAddress($Email);     //Add a recipient

			//Content
			$mail->isHTML(true);                                    //Set email format to HTML
			$mail->Subject = $Placed;
			$mail->Body = "
						<span style='color:maroon; font-size:18px;'> Customer Name : </span>  $name
						<br />
						<span style='color:maroon; font-size:18px;' >Customer Number : </span>   $Number
						<br />
						<span style='color:maroon; font-size:18px;' >Product Name With Quentity : </span> $Total_Name
						<br />
						<span style='color:maroon; font-size:18px;'>Product Price : </span> $TotalPrice
						<br />
						<span style='color:maroon; font-size:18px;'>Payment : </span> Succesfull
						<br />
						<span style='color:maroon; font-size:18px;'>Date : </span> $Date
						<br />
						<span style='color:maroon; font-size:18px;'>Address : </span>   $Flat 
									$Street,
									$City, 
									$State 
									$Country 
									$Pincode";

			$mail->send();
			// echo '<script>alert("Message has been sent");</script>';
			mysqli_query($conn, "DELETE FROM `cart`");
			header('location:Indexed.php');
		} catch (Exception $e) {
			echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
		}
	}
}



// Pdf
if (isset($_POST['Get_Invoice'])) {

	$Order_Name = $_GET['Invoice'];
	// echo $Order_Name;
	// die();
	// // Order Query
	$Query = "SELECT * FROM `shippingaddress` WHERE `Name` = '$Order_Name'";
	$Result = mysqli_query($conn, $Query);


	// Fetch Deta
	$Row = mysqli_fetch_assoc($Result);

	$Invoice = $Row['sa_id'];
	$Order_Name = $Row['Totalproducts'];
	$TotalPrice = $Row['TotalPrice'];
	$Date = $Row['Date'];
	// $TotalPrice = $Row['TotalPrice'];
	$name = $Row['Name'];
	$Email = $Row['Email'];
	$Flat = $Row['Flat'];
	$Street = $Row['Street'];
	$Number = $Row['Number'];
	$City = $Row['City'];
	$State = $Row['State'];
	$Pincode = $Row['Pincode'];
	$Method = $Row['Method'];


	require_once __DIR__ . '/vendor/autoload.php';
	$Css = "@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
				
				body {
					background-color: #F6F6F6;
					margin: 0;
					padding: 0;
					font-family: 'Poppins';
			
				}
			
				h1,
				h2,
				h3,
				h4,
				h5,
				h6 {
					margin: 0;
					padding: 0;
				}
			
				p {
					margin: 0;
					padding: 0;
				}
			
				.container {
					width: 80%;
					margin-right: auto;
					margin-left: auto;
				}
			
				.brand-section {
					background-color: maroon;
					padding: 10px 40px;
				}
			
				.logo {
					width: 50%;
				}
			
				.row {
					display: flex;
					flex-wrap: wrap;
				}
			
				.col-6 {
					width: 50%;
					flex: 0 0 auto;
				}
			
				.text-white {
					color: #fff;
					letter-spacing: 1px;
					word-spacing: 3px;
				}
			
				.company-details {
					float: right;
					text-align: right;
				}
			
				.body-section {
					padding: 16px;
					border: 1px solid gray;
				}
			
				.heading {
					font-size: 20px;
					margin-bottom: 08px;
				}
			
				.sub-heading {
					color: #262626;
					margin-bottom: 05px;
				}
			
				table {
					background-color: #fff;
					width: 100%;
					border-collapse: collapse;
				}
			
				table thead tr {
					border: 1px solid #111;
					background-color: #f2f2f2;
				}
			
				table td {
					vertical-align: middle !important;
					text-align: center;
				}
			
				table th,
				table td {
					padding-top: 08px;
					padding-bottom: 08px;
				}
			
				.table-bordered {
					box-shadow: 0px 0px 5px 0.5px gray;
				}
			
				.table-bordered td,
				.table-bordered th {
					border: 1px solid #dee2e6;
				}
			
				.text-right {
					text-align: end;
				}
			
				.w-20 {
					width: 20%;
				}
			
				.float-right {
					float: right;
				}";

	$Html = '<div class="container">
					<div class="brand-section">
						<div class="row">
							<div class="col-6">
								<h1 class="text-white">CRAFTHOLIC</h1>
							</div>
						</div>
					</div>

					<div class="body-section">
						<div class="row">
							<div class="col-6">
								<h2 class="heading">Invoice No.: ' . $Invoice . '</h2>
								<p class="sub-heading">Order Date: ' . $Date . ' </p>
								<p class="sub-heading">Email Address: ' . $Email . '</p>
							</div>
							<div class="col-6">
								<p class="sub-heading">Full Name: ' . $name . '</p>
								<p class="sub-heading">Address: ' . $Flat . " " . $Street . ' </p>
								<p class="sub-heading">Phone Number:' . " " . $Number . ' </p>
								<p class="sub-heading">City::' . " " . $City . ', <br/> State::' . " " . $State . ',<br/> Pincode::' . $Pincode . ' </p>
							</div>
						</div>
					</div>

					<div class="body-section">
						<h3 class="heading">Ordered Items</h3>
						<br>
						<table class="table-bordered">
							<thead>
								<tr>
									<th>Product with Quentity</th>
									<th class="w-20">Price</th>
									<th class="w-20">Method</th>
									<th class="w-20">Grandtotal</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>' . $Order_Name . '</td>
									<td>' . $TotalPrice . '</td>
									<td>' . $Method . '</td>
									<td>' . $TotalPrice . '</td>
								</tr>
								<tr>
									<td colspan="3" class="text-right">Sub Total</td>
									<td>' . $TotalPrice . '</td>
								</tr>
								<tr>
									<td colspan="3" class="text-right">Shipping</td>
									<td>Free</td>
								</tr>
								<tr>
									<td colspan="3" class="text-right">Grand Total</td>
									<td>' . $TotalPrice . '</td>
								</tr>
							</tbody>
						</table>
						<br>

					</div>

					<div class="body-section">
						<p>&copy; Copyright 2022 - CRAFTHOLIC. All rights reserved.
						</p>
					</div>
				</div>';

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($Css, 1);
	$mpdf->WriteHTML($Html, 2);
	$mpdf->Output();
}

?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRAFTHOLIC</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<!-- External CSS -->
	<link rel="stylesheet" href="CSS/Thankyou.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.1.0/css/all.css'>
	<!-- <link rel="stylesheet" href="CSS/Feedback.css"> -->
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

	<!-- ByDefault  -->
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src="JavaScript/Onclick_Function.js"></script>
	<!-- <script src="JavaScript/Feedback.js"></script> -->

	<!-- Icon Library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="32x32" href="../craftholic/CH_favicon/favicon-32x32.png">

</head>

<body>

	<!-- Click To Top -->
	<section class="Arrow-btn">
		<!-- <a href="indexed.php"><i class="fa-solid fa-house" ></i></a> -->
		<form action="" method="post">
			<?php
			$Select_Cart = mysqli_query($conn, "SELECT * FROM `cart`");
			if (mysqli_num_rows($Select_Cart) > 0) {
				while ($Fetch_Cart = mysqli_fetch_assoc($Select_Cart)) {

			?>
					<input type="hidden" value="<?php echo $Fetch_Cart['id']; ?>" name="id">

			<?php
				}
			}
			?>
			<button class="normal" name="home">Home</button>
		</form>
	</section>

	<!-- Thank You -->
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title"><span>THANK</span> YOU!</h1>
	</header>

	<!-- Thank You msg -->
	<section class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for filling that out. It means a
			lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for
			being you.</p>
	</section>

	<!-- Buttons -->
	<section class="section-m1">
		<button class="normal" onclick="track_order('Track-order')">track order</button>
		<button class="normal" onclick="Feedback('FeedBack')">Feedback</button>
		<form action="" method="post">

			<button class="normal" name="Get_Invoice">Invoice</button>
		</form>
	</section>


	<!-- Track order -->
	<section class="step-wizard section-m1" id="Track-order">

		<ul class="step-wizard-list">
			<li class="step-wizard-item">
				<span class="progress-count">1</span>
				<span class="progress-label">Order Placed</span>
			</li>
			<li class="step-wizard-item current-item">
				<span class="progress-count">2</span>
				<span class="progress-label">Shipped </span>
			</li>
			<li class="step-wizard-item">
				<span class="progress-count">3</span>
				<span class="progress-label">On the Way</span>
			</li>
			<li class="step-wizard-item">
				<span class="progress-count">4</span>
				<span class="progress-label">Delivered</span>
			</li>
		</ul>
	</section>

	<!-- FeedBack -->
	<section id="FeedBack">
		<div class="master">
			<!-- <h1>Review And rating</h1> -->
			<h2>How was your experience about our product?</h2>

			<div class="rating-component">
				<div class="status-msg">
					<label>
						<input class="rating_msg" type="hidden" name="rating_msg" value="" />
					</label>
				</div>
				<div class="stars-box">
					<i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
					<i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
					<i class="star fa fa-star" title="3 stars" data-message="Average quality" data-value="3"></i>
					<i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
					<i class="star fa fa-star" title="5 stars" data-message="very good qality" data-value="5"></i>
				</div>
				<div class="starrate">
					<label>
						<input class="ratevalue" type="hidden" name="rate_value" value="" />
					</label>
				</div>
			</div>

			<div class="feedback-tags">
				<div class="tags-container" data-tag-set="1">
					<div class="question-tag">
						Why was your experience so bad?
					</div>
				</div>
				<div class="tags-container" data-tag-set="2">
					<div class="question-tag">
						Why was your experience so bad?
					</div>

				</div>

				<div class="tags-container" data-tag-set="3">
					<div class="question-tag">
						Why was your average rating experience ?
					</div>
				</div>
				<div class="tags-container" data-tag-set="4">
					<div class="question-tag">
						Why was your experience good?
					</div>
				</div>

				<div class="tags-container" data-tag-set="5">
					<div class="make-compliment">
						<div class="compliment-container">
							CRAFTHOLIC, Gives you a compliment
							<i class="far fa-smile-wink"></i>
						</div>
					</div>
				</div>

				<div class="tags-box">
					<input type="text" class="tag form-control" name="comment" id="inlineFormInputName" placeholder="Write your review">
					<input type="hidden" name="product_id" value="{{ $products->id }}" />
				</div>

			</div>

			<div class="button-box">
				<input type="submit" class=" done btn btn-warning" disabled="disabled" value="Add review" />
			</div>

			<div class="submited-box">
				<div class="loader"></div>
				<div class="success-message">
					Thank you!
				</div>
			</div>
		</div>

	</section>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">Copyright ©2020 | All Rights Reserved</p>
	</footer>

</body>

</html>

<!--  For Feedback  -->
<script>
	$(".rating-component .star").on("mouseover", function() {
		var onStar = parseInt($(this).data("value"), 10); //
		$(this).parent().children("i.star").each(function(e) {
			if (e < onStar) {
				$(this).addClass("hover");
			} else {
				$(this).removeClass("hover");
			}
		});
	}).on("mouseout", function() {
		$(this).parent().children("i.star").each(function(e) {
			$(this).removeClass("hover");
		});
	});

	$(".rating-component .stars-box .star").on("click", function() {
		var onStar = parseInt($(this).data("value"), 10);
		var stars = $(this).parent().children("i.star");
		var ratingMessage = $(this).data("message");

		var msg = "";
		if (onStar > 1) {
			msg = onStar;
		} else {
			msg = onStar;
		}
		$('.rating-component .starrate .ratevalue').val(msg);



		$(".fa-smile-wink").show();

		$(".button-box .done").show();

		if (onStar === 5) {
			$(".button-box .done").removeAttr("disabled");
		} else {
			$(".button-box .done").attr("disabled", "true");
		}

		for (i = 0; i < stars.length; i++) {
			$(stars[i]).removeClass("selected");
		}

		for (i = 0; i < onStar; i++) {
			$(stars[i]).addClass("selected");
		}

		$(".status-msg .rating_msg").val(ratingMessage);
		$(".status-msg").html(ratingMessage);
		$("[data-tag-set]").hide();
		$("[data-tag-set=" + onStar + "]").show();
	});

	$(".feedback-tags  ").on("click", function() {
		var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
		choosedTagsLength = choosedTagsLength + 1;

		if ($(this).hasClass("choosed")) {
			$(this).removeClass("choosed");
			choosedTagsLength = choosedTagsLength - 2;
		} else {
			$(this).addClass("choosed");
			$(".button-box .done").removeAttr("disabled");
		}

		console.log(choosedTagsLength);

		if (choosedTagsLength <= 0) {
			$(".button-box .done").attr("enabled", "false");
		}
	});



	$(".compliment-container .fa-smile-wink").on("click", function() {
		$(this).fadeOut("slow", function() {
			$(".list-of-compliment").fadeIn();
		});
	});



	$(".done").on("click", function() {
		$(".rating-component").hide();
		$(".feedback-tags").hide();
		$(".button-box").hide();
		$(".submited-box").show();
		$(".submited-box .loader").show();

		setTimeout(function() {
			$(".submited-box .loader").hide();
			$(".submited-box .success-message").show();
		}, 1500);
	});
</script>