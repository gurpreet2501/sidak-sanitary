<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/billing/sb-admin.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/billing/style.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/billing/print.css')?>"/>
<div class="container-fluid billing-temp">
	<div class="row">
		<div class="col-xs-2"></div>	
		<div class="col-xs-8">
			<div class="text-center">
				<h3 class="text-center title"><strong>SIDAK INDUSTRIES</strong></h1>
				<div class="sub-headings">D-174, Focal Point, Patiala.</div>
				<div class="sub-headings">Mobile: 9814002872, +91-8872102872, Email: manmeetindustries1@gmail.com</div>
				<br/>
			</div>
		</div>	
		<div class="col-xs-2">
		  <br>
			<a class="no-print" href="<?=site_url('super_admin/create_bill')?>" on:click><button type="button" class="btn btn-danger no-print">Back</button></a>
			<a class="no-print" onclick="window.print()"><button type="button" class="btn btn-danger no-print">Print</button></a>
		</div>	
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="billing_items">
					<table class="table table-bordered">
						<tr>
							<td align="center"><strong>Sno</strong></th>
							<td align="center"><strong>Item</strong></th>
							<td align="center"><strong>SKU Code</strong></th>
							<td align="center"><strong>Price</strong></th>
							<td align="center"><strong>Stock</strong></th>
							<td align="center"><strong>Sub Total (Price x Stock)</strong></th>
						</tr>
					
							<tr>
								<td align="center">1</td>
								<td align="center">Cera Seats</td>
								<td align="center">Sk34354</td>
								<td align="center">435</td>
								<td align="center">43</td>
								<td align="center">3453653</td>
							</tr>
								<tr>
								<td align="center">1</td>
								<td align="center">Cera Seats</td>
								<td align="center">Sk34354</td>
								<td align="center">435</td>
								<td align="center">43</td>
								<td align="center">3453653</td>
							</tr>
								<tr>
								<td align="center">1</td>
								<td align="center">Cera Seats</td>
								<td align="center">Sk34354</td>
								<td align="center">435</td>
								<td align="center">43</td>
								<td align="center">3453653</td>
							</tr>
								<tr>
								<td align="center">1</td>
								<td align="center">Cera Seats</td>
								<td align="center">Sk34354</td>
								<td align="center">435</td>
								<td align="center">43</td>
								<td align="center">3453653</td>
							</tr>
								<tr>
								<td align="center">1</td>
								<td align="center">Cera Seats</td>
								<td align="center">Sk34354</td>
								<td align="center">435</td>
								<td align="center">43</td>
								<td align="center">3453653</td>
							</tr>
								<tr>
								<td align="center">1</td>
								<td align="center">Cera Seats</td>
								<td align="center">Sk34354</td>
								<td align="center">435</td>
								<td align="center">43</td>
								<td align="center">3453653</td>
							</tr>
								<tr>
								<td align="center">1</td>
								<td align="center">Cera Seats</td>
								<td align="center">Sk34354</td>
								<td align="center">435</td>
								<td align="center">43</td>
								<td align="center">3453653</td>
							</tr>
						
					
					</table>
				</div>
		</div>
		<div class="col-xs-1"></div>
			
	</div>
	<div class="row">
		<div class="col-xs-7">
			<table class="table table-bordered">
					<tr>
						<td>Bank Details: </td>
						<td><strong>INDIAN BANK, PATIALA</strong></td>
					</tr>
					<tr>
						<td>Bank Account No.</td>
						<td><strong>CA6132997465</strong></td>
					</tr>
					<tr>
						<td>Bank Branch IFSC</td>
						<td><strong>IDIB000U037</strong></td>
					</tr>
				</table>
		
				<table class="table table-bordered">
					<tr>
						<td>Bank Details:</td>
						<td><strong>ORIENTAL BANK  OF COMMERCE, PATIALA</strong></td>
					</tr>
					<tr>
						<td>Bank Account No.</td>
						<td><strong>20231131000223</strong></td>
					</tr>
					<tr>
						<td>Bank Branch IFSC</td>
						<td><strong>ORBC0102023</strong></td>
					</tr>
				</table>
		
		</div> <!-- col-xs-6 -->
		<div class="col-xs-5">
	
			<table class="table table-bordered">
					<tr>
						<td><strong>Total Amount Before Tax:</strong></td>
						<td>Rs.34</td>
					</tr>
					
						<tr>
							<td align="center">54%</td>
							<td>Rs.543 </td>
						</tr>
					
					<tr>
						<td><strong>Total GST amount:</strong></td>
						<td>Rs.543</td>
					</tr>
					<tr>
						<td><strong>Fright Charges:</strong></td>
						<td>Rs.545</td>
					</tr>
				
						<tr>
							<td align="center">4%</td>
							<td>Rs.45 </td>
						</tr>
			
					<tr>
						<td><strong>Total amount after tax:</strong></td>
						<td>Rs.45</td>
					</tr>
			</table>
			
			
		</div>
	</div>
 <?php $this->load->view('billing/terms-and-conditions')?>	
	<br/>
	<br/>
	<br/>