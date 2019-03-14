<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/billing/sb-admin.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/billing/style.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/billing/print.css')?>"/>
<link rel="stylesheet" type="text/css" href="css/billing-temp.css">
<div class="outer-box">
	

<div class="container-fluid billing-temp">
	
	<div class="row">
		<div class="col-md-9"></div>
		<div class="col-md-3">
				<br class="no-print"/>
				<a class="no-print" href="<?=site_url('super_admin/create_bill')?>" on:click><button type="button" class="btn btn-danger no-print">Back</button></a>
				<a class="no-print" onclick="window.print()"><button type="button" class="btn btn-danger no-print">Print</button></a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<p class="font-12">GSTIN: <?=env('gst_no','5345345')?> <br> STATE: 03-PUNJAB <br> PAN : <?=env('pan_no','5345345')?></p>
		</div>		<!-- col-xs-4 end -->
		<div class="col-xs-4">
			<p class="text-center font-12">FORM GST INV-1 (TAX INVOICE)</p>
			<p class="text-center font-10">(See Sec.31 & Rule-7)</p>
		</div>		<!-- col-xs-4 end -->
		<div class="col-xs-4">
       <p class="text-right font-12">PH. :<?=env('phone_1','5345345')?> <br> <?=env('phone_2','5345345')?> <br> <?=env('email','5345345')?></p>

		</div>		<!-- col-xs-4 end -->
	</div><!-- row end -->
	<div class="row">
		<div class="col-xs-2">
			<br>
			<div class="distr">Distributors <div> Contractor</div> & Suppliers</div>
		</div><!-- 		col-xs-2 -->
		<div class="col-xs-8">
			<div class="heading text-center"><u>SIDAK INDUSTRIES</u>
				<div class="sub-heading">ALL Types of PVC Pipes. Gl Pipes.Submersible Pumps, Sanitary Ware Taps & all Construction Material</div>
			</div>
		</div><!-- col-xs-6 -->
		<div class="col-xs-2">
			<div class="address">
				<br>
				<?=env('address','5345345')?>
			</div>
		</div>		<!-- col-xs-2 -->
	</div><!-- row -->
	<div class="row">
		<div class="col-xs-12">
			<div class="logos clearfix">
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/grohe.jpg')?>" class="img-fit-container" />
				</div>
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/cera.png')?>" class="img-fit-container" />
				</div>
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/varmora.png')?>" class="img-fit-container" />
				</div>
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/jaguar.png')?>" class="img-fit-container" />
				</div>
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/hindware.jpg')?>" class="img-fit-container" />
				</div>
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/ashirvad.png')?>" class="img-fit-container" />
				</div>
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/crompton.jpg')?>" class="img-fit-container" />
				</div>
				<div class="single-logo">
						<img src="<?=base_url('assets/images/logo/finolex.png')?>" class="img-fit-container" />
				</div>
			</div> <!-- logos -->
		</div>
	</div><!-- row logo -->

	<div class="row">
		<div class="col-xs-8">
			<table class="table table-striped">
				<tr class="border-none">
					<td>BILL TO: SUBASH CHAND G <br> PATIALA</td>
				</tr>
				<tr class="border-none">
					<td>PHONE:</td>
				</tr>
				<tr class="border-none">
					<td>GSTIN:</td>
				</tr>
			</table>

	  </div><!-- col-xs-8 -->
	  <div class="col-xs-4">
	  	<table class="table table-striped">
	  		<tr>
	  			<td>INVOICE NO: <?=$bill_details->id?></td>
	  		</tr>
	  		<tr>
	  			<td> DATED    :<?=date('d-m-Y',strtotime($bill_details->bill_date))?>  </td>
	  		</tr>
	  		<tr>
	  			<td>  TYPE    :CASH  </td>
	  		</tr>
	  	</table>
</div><!-- row -->
	  </div>	  <!-- col-xs-4 -->
	  
	  <div class="row">
	  	<div class="col-xs-12">
	  		<table class="table table-striped">
	  			<tr>
	  				<td><strong>SR</strong></td>
	  				<td><strong>DESCRIPTION</strong></td>
	  				<td><strong>HSN</strong></td>
	  				<td><strong>GST</strong>%</td>
	  				<td><strong>QTY</strong>./UNIT</td>
	  				<td><strong>RATE</strong></td>
	  				<td><strong>DISC</strong>%</td>
	  				<td><strong>TAXABLE</strong></td>
	  			</tr>
	  			<?php foreach ($bill_details->billingItems as $key => $bitem): ?>
	  			<tr>
	  				<td>1.</td>
	  				<td><?=$bitem->item_name?></td>
	  				<td>0</td>
	  				<td><?=$bitem->gst_in_percentage?></td>
	  				<td><?=$bitem->quantity_ordered?>Pcs.</td>
	  				<td><?=$bitem->price?></td>
	  				<td><?=$bitem->discount_in_percentage?></td>
	  				<td>-</td>
	  			</tr>
	  		<?php endforeach;?>
	  		</table>
	  	</div><!-- 	col-xs-12 -->
	  </div><!-- row -->
	  <div class="row">
	  	<div class=col-xs-9>
	  		<table class="table table-striped">
	  			<tr>
	  				<td>GST%</td>
	  				<td>Amount</td>
	  				<td>IGST</td>
	  				<td>SGST</td>
	  				<td>CGST</td>
	  				<td>CESS</td>
	  			</tr>
	  			
	  			<tr>
	  				<td>34</td>
	  				<td>42</td>
	  				<td>54</td>
	  				<td>43</td>
	  				<td>3</td>
	  				<td>12</td>
	  			</tr>

	  			<tr>
	  				<td colspan="5">
	  					PUNJAB NATIONAL BANK
	  					<div>A/C: 3875634753658365</div>
	  					<div>RTGS:PUNB0601200</div>
	  				</td>
	  				<td>
	  					=Total GST=
	  					<div>1342.00</div>
	  				</td>
	  			</tr>
	  		</table>
	  	</div>
	  	<div class=col-xs-3>
	  		<table class="table table-striped">
	  		<tr>
	  			<td>TAXABLE</td>
	  			<td>7447.00</td>
	  		</tr>
	  		<tr>
	  			<td> IGST </td>
	  			<td>  </td>
	  		</tr>
	  		<tr>
	  			<td>  SGST  </td>
	  			<td>   671.00 </td>
	  		</tr>
	  		<tr>
	  			<td>  CGST  </td>
	  			<td>   671.00 </td>
	  		</tr>
	  		<tr>
	  			<td>  CESS </td>
	  			<td>    </td>
	  		</tr>
	  		<tr>
	  			<td>  OTHER  </td>
	  			<td>   </td>
	  		</tr>
	  		<tr>
	  			<td>  ROUNDOFF  </td>
	  			<td>    </td>
	  		</tr>
	  		<tr>
	  			<td>  G. TOTAL  </td>
	  			<td>   8789.00 </td>
	  		</tr>
	  	</table>
	  	</div>	  	<!-- col-xs-3 -->
	  </div>	  <!-- row -->
	  <hr class="full-width-black">
	  <div class="row">
	  	<div class="col-xs-7">
	  		<ul>
	  			<li class="font-12">Intt.@ 36%p/a will be charged on our due a/c. * Goods once sold can not be returned.</li>
	  			<li class="font-12">Our responsibility ceases after the goods removed from our permises.</li>
	  			<li class="font-12" >Subject to Patiala Jurisdiction only. </li>
	  		</ul>
	  		<p class="font-10">RECEIVED TO ABOVE MENTIONED GOODS WITH CORRECT RATE ,QTY. & CONDITION.</p> 
	  	</div>	  <!-- 	col-xs-9 -->
	  	<div class="col-xs-2">

	  		<div class="form-group">
			  	<label>Electronic Ref No./DT.</label>
					<input type="text" class="form-control"  />
		  	</div>
		  	<div class="font-10">
		  		Customer Sign
		  	</div>
	  	</div>
	  	<div class="col-xs-3">
	  		<div >
	  			FOR SIDAK INDUSTRIES
	  			<br>
	  			<br>
	  			<br>
	  			<br>
	  			<div class="font-10">		[Authorised Signatory]</div>
	  			</div>
	  		
	  	</div><!-- 	col-xs-3 -->
	  
	  </div><!-- row -->
	  
</div><!-- container-fluid billing-temp -->		
</div> <!-- outer-box -->