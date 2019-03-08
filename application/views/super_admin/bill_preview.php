<?php $this->load->view('admin/partials/header'); ?>
<div class="row">
	<div class="col-md-12">
		<h2>Sidak Industries</h2>	
	</div>
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
			<div>To:</div> 
			<div>Bill Date:</div> 
		</div>
	<div class="col-md-4"></div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<tr>
				<td>Item Name</td>
				<td>Price (per/piece)</td>
				<td>Quantity(in pieces)</td>
				<td>Price X Qty</td>
				<td>GST in Percentage</td>
				<td>Discount in Percentage</td>
				<td>Sub Total</td>
			</tr>
			<?php 
				$grand_total = 0;
			  foreach ($items as $key => $itemm): 
					
					$temp_price = $itemm['item_details']->price*$itemm['items_count'];
					
					$gst_amount = calculateGst($temp_price,$itemm['gst']);

					$discount = calculateDiscount($temp_price,$itemm['discount']);

					$total = $temp_price +  $gst_amount - $discount;

					$grand_total = $grand_total + $total;
				?>
				<tr>
					<td width="35%"><?=$itemm['item_details']->name?></td>
					<td>Rs.<?=$itemm['item_details']->price?></td>
					<td><?=$itemm['items_count']?></td>
					<td>Rs. <?=$temp_price?></td>
					<td>Rs. <?=$gst_amount?> (<?=$itemm['gst']?>)%</td>
					<td>Rs <?=$discount?> (<?=$itemm['discount']? $itemm['discount'] : '--'?>%)</td>
					<td>Rs.<?=$total?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="5"></td>
				<td>Grand Total:</td>
				<td><strong>Rs. <?=$grand_total?></strong></td>
			</tr>
		</table>
	</div>
</div>
<?php $this->load->view('admin/partials/footer'); ?>
