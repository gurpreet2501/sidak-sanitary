<?php $this->load->view('admin/partials/header'); ?>

<form action="<?=site_url('super_admin/bill_preview')?>" method="post" class="validate">
	<div class="hr-background-img" id="billing_form">
		<div class="row">
		<div class="col-xs-12">
				<h1 class="text-center">Billing</h1>
			</div>
		</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
							<div class="form-group">
								<label>Party Name</label>
								<select class="form-control chosen-select required" name="party">
														<option selected="true" value="NULL" disabled="true">-Select Party-</option>
									<?php foreach ($parties as $key => $party): ?>
														<option value="<?=$party->id?>"><?=$party->name?></option>
									<?php endforeach ?>
								</select>
								<input id="enter_party" type="text" name="party_name_for_addition" class="form-control" placeholder="Party Name if not found" />
							</div>						
							<div class="form-group">
								<label>Bill Date</label>
								<input type="text" name="bill_date" class="_datepicker form-control required" value="<?=date('Y-m-d')?>" />
							</div>
							<div class="form-group">
								<label>Freight Charges</label>
								<input type="text" name="freight_charges" class="form-control" />
							</div>
					</div>
				</div>
				<!-- Items -->
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-4"><h5>Select Items</h5></div>
						<div class="col-md-2"><h5>Items Count</h5></div>
						<div class="col-md-2"><h5>Gst</h5></div>
						<div class="col-md-2"><h5>Discount</h5></div>
						<div class="col-md-1"></div>
					</div>
					<div class="row"  v-for="n in items_count" v-model="items_count">
							<div class="col-md-1"></div>
							<div class="col-xs-4">
								<div class="form-group">
									<select class="form-control chosen-select required"  v-bind:name="'item['+n+'][item_id]'">
									   <option selected disabled>-Select Items-</option>
										 <option  v-bind:value="item.id" v-for='item in allItems'>
										 		{{item.name }}
										 	</option>
									</select>
								</div>
							</div>
						
							<div class="col-xs-2">
								<div class="form-group">
									<input class="form-control required" type="number" v-bind:name="'item['+n+'][items_count]'" placeholder="Items Count"/>
								</div>
							</div>

							<div class="col-xs-2">
								<div class="form-group">
									<input class="form-control" type="number" v-bind:name="'item['+n+'][gst]'" placeholder="Enter Gst in Percentage" value="18"/>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<input class="form-control" type="text" v-bind:name="'item['+n+'][discount]'" placeholder="Enter discount in percentage"/>
								</div>
							</div>
							<div class="col-xs-1"></div>
						</div> <!-- row -->
				<!-- Items END -->
				<button type="button" v-on:click="addNewItem()" class='btn btn-primary btn-sm pull-right'>Add Items</button>

				<input type="submit" value="Generate Bill" class="btn btn-danger">
				</div>

</form>

<?php $this->load->view('admin/partials/footer'); ?>
