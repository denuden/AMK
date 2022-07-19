<?php
	session_start();
	if (!isset($_GET['receiptid'])) {
		// code...
		header("Location: /AMK/admin-payroll-manage"); /* Redirect browser */
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>AMK Digital Payroll System</title>
		<style>
			
			.invoice-box {
				max-width: 95%;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0" class="tableAppend">
				<tr class="top">
					<td colspan="5">
						<table>
							<tr>
								<td class="title">
									<img src="images/logo.png" style="width: 100%; max-width: 120px" />
								</td>
<?php
require_once 'php/config/config.php';
$sql  = "SELECT * FROM payroll_tbl WHERE id = '". $_GET['receiptid'] ."'";
$stmt = $dbh->query($sql);
$row = $stmt->fetch();


?>
								<td>
								<?php
                                    $date = date_create(htmlspecialchars($row['date_released']));
                                    $formattedDate = date_format($date, 'D M j-Y, g:i a');
                                    echo "Date Released: ".$formattedDate;
                                  ?><br />
									 <br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="5">
						<table>
							<tr>
								<td>
									AMK Variety Store<br />
									New Cabalan, Olongapo City<br />
									Zambales 2200
								</td>

								<td>
									Employee ID: <?php echo htmlspecialchars($row['employee_id']) ;?><br />
									Name: <?php echo htmlspecialchars($row['fullname']);?><br/>
									Position: <?php echo htmlspecialchars($row['position']);?><br>
								</td>
					
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="5">
						<table>
						<tr class="heading">
								<td colspan="5">Deductions</td>
						</tr>

							<tr>
								<td>
								<?php 
								foreach (json_decode($row['deductions']) as $item) {
                        			 ?>
                                    <li style="list-style:none">
                                      <?php echo htmlspecialchars($item->mode . ': ₱' . $item->deduction)?></li>
                                    <?php } ?>
								</td>
								
								<td style="text-align:left">
								<?php 
								foreach (json_decode($row['deductions']) as $item) {
                        			 ?>
                                    <li style="list-style:none">
                                      Reason: <?php echo htmlspecialchars($item->reason)?></li>
                                    <?php } ?>
								</td>
								
								<td style="text-align:left">
								<?php 
								foreach (json_decode($row['deductions']) as $item) {
                        			 ?>
                                    <li style="list-style:none">
                                      <?php echo htmlspecialchars($item->start)?> to <?php echo htmlspecialchars($item->until)?> </li>
                                    <?php } ?>
								</td>
					
							</tr>
						</table>
					</td>
				</tr>


				
				<tr class="heading">
					
				<td style="text-align:left">Total Allowance</td>

					<td style="text-align:left">Inital Salary</td>

					<td style="text-align:left">Total Deduction</td>

					<td>Date Range</td>

					<td>Total Calculated Salary</td>
			
				</tr>

				<tr>
				<td style="text-align:left">₱ <?php echo htmlspecialchars($row['allowance_amount']) ;?>.00</td>

					<td style="text-align:left">₱ <?php echo htmlspecialchars($row['salary']) ;?>.00</td>
		
					<td style="text-align:left">₱ <?php echo htmlspecialchars($row['total_deduction_amount']) ;?>.00</td>

					<td>
						<?php echo htmlspecialchars($row['start']) ;?> <br/> to
						<?php echo htmlspecialchars($row['until']);?>
					</td>

					<td style="font-weight:900">₱ <?php echo htmlspecialchars($row['total_salary']) ;?>.00</td>
	

				</tr>


<!-- <script type="text/javascript">
	let myArray =  JSON.parse(sessionStorage.getItem("arr"));
	let total = 0;

	for (var i = 0; i < myArray.length; i++) {
		console.log(myArray[i]);
		$('.tableAppend').append('<tr class="item">'+
			'<td>'+ myArray[i].Name +'</td>' +
			'<td>'+ myArray[i].Quantity +'</td>' +
			'<td>'+ myArray[i].Price +'</td></tr>'
		)
		total+= parseFloat(myArray[i].Price * myArray[i].Quantity)

}
		// total
		$('.tableAppend').append('<tr class="total">'+
			'<td></td>' +
			'<td> Total: &#8369;' + total.toFixed(2) +'</td></tr>'
		)


</script> -->

			</table>
		</div>



    <script type="text/javascript">
      window.print();
      onafterprint = function () {
        window.location.replace('/AMK/admin-payroll-manage');
           }

    </script>

  </body>
</html>
