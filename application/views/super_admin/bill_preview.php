<?php $this->load->view('admin/partials/header');?>
<div class="row">
	<div class="col-md-12">
		<h2>Sidak Industries</h2>	
	</div>
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
			<div class="text-center">
				<h4>Party Name: <?=$party_name?></h4> 
				<h4>Bill Date:<?=$bill_date?></h4> 
		</div>
	</div>	
	<div class="col-md-4"></div>
</div>
<form action="<?=site_url('super_admin/generate_bill')?>" method="post">
<div class="row">
	<div class="col-md-12">
		<table class="table table-hover">
			<tr>
				<td>#ID</td>
				<td>Item Name</td>
				<td>Price (per/piece)</td>
				<td>Available Stock</td>
				<td>Quantity Ordered(in pieces)</td>
				<td>Price X Qty</td>
				<td>GST in Percentage</td>
				<td>Discount in Percentage</td>
				<td>Sub Total</td>
				<td></td>
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
				<tr id="item_<?=$itemm['item_details']->id?>">
					
						<input type="hidden" name="items[<?=$key?>][item_id]" value="<?=$itemm['item_details']->id?>">
						<input type="hidden" name="items[<?=$key?>][item_name]" value="<?=$itemm['item_details']->name?>">
						<input type="hidden" name="items[<?=$key?>][gst]" value="<?=$itemm['gst']?>">
						<input type="hidden" name="items[<?=$key?>][discount]" value="<?=$itemm['discount']?>">
						<input type="hidden" name="items[<?=$key?>][item_price]" value="<?=$itemm['item_details']->price?>">
						<input type="hidden" name="items[<?=$key?>][item_stock]" value="<?=$itemm['item_details']->stock?>">
						<input type="hidden" name="items[<?=$key?>][item_sku]" value="<?=$itemm['item_details']->sku?>">
						<input type="hidden" name="bill_date" value="<?=$bill_date?>">
						<input type="hidden" name="party_name" value="<?=$party_name?>">
						<input type="hidden" name="freight_charges" value="<?=$freight_charges?>">
						<input type="hidden" name="party_id" value="<?=$party_id?>">
					<td>
						<?=$itemm['item_details']->id?>
					</td>
					<td class="item-name-col">
						 <span class='badge badge-danger'><?=wordwrap($itemm['item_details']->name,35,"<br>\n")?></span>
							
					</td>
					<td class="item_price">
						
						<?=$itemm['item_details']->price?>
							
					</td>
					<td>
						 
						 <?php 
						 		if($itemm['item_details']->stock <=10 && $itemm['item_details']->stock >0)
						 			$badge = 'badge-warning';
						 		else if($itemm['item_details']->stock == 0)			
						 			$badge = 'badge-danger';
						 		else 
						 			$badge = 'badge-success';
						 		?>
						<span class="badge <?=$badge?>"><?=$itemm['item_details']->stock?></span>
					</td>
					<td class="item_qty">
						<input type="text" name="items[<?=$key?>][quantity_ordered]" id="<?=$itemm['item_details']->id?>" value="<?=$itemm['items_count']?>"/>
							
					</td>
					<td><?=$temp_price?></td>
					<td class='gst_amount'>
						<?=$gst_amount?> (<?=$itemm['gst']?>)%
					</td>
					<td class='discount'>
						<?=$discount?> (<?=$itemm['discount']? $itemm['discount'] : ''?>%)
					</td>
					<td><?=$total?></td>

				</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="5"></td>
				<td>Freight Charges:</td>
				<td width="12%"><strong>Rs. <?=$freight_charges?></strong></td>
			</tr>
			<tr>
				<td colspan="5"><input type="submit" class="pull-right btn btn-primary" value="Generate Bill"></td>
				<td>Grand Total:</td>
				<td width="12%"><strong>Rs. <?=$grand_total+$freight_charges?></strong></td>
			</tr>
		</table>
	</div>
</div>
</form>
<?php $this->load->view('admin/partials/footer'); ?>
