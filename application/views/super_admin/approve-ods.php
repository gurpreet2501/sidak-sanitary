<?php $this->load->view('admin/partials/header') ?>

<div class="row">
	<div class="col-md-12">
		<div class="form-filters">
				<form class="form-inline" method="post" action="<?=site_url('hr/approve_ods')?>">
					  <div class="form-group">
					    <label for="exampleInputName2">Start Date</label>
					    <input type="text" name="start_date" class="form-control _datepicker" id="start_date" placeholder="Start Date">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail2">End Date</label>
					    <input type="text" name="end_date" class="form-control _datepicker" placeholder="End Date">
					  </div>
					  <div class="form-group">
					    <button type="submit" class="btn btn-default">Filter</button>
					  </div>
					</form> <!-- form ending -->
		</div> <!-- form-filters end -->
	</div> <!-- column ends -->
</div> <!-- row ends -->
<div class="row">
	<div class="col-md-12">
		<div class="records">
			<br>
			<table class="table table-bordered">

				<tr>
					<td><strong>Od Date</strong></td>
					<td><strong>Employee ID</strong></td>
					<td><strong>Employee Name</strong></td>
					<td><strong>Leave Type</strong></td>
					<td><strong>Concerned Person</strong></td>
					<td><strong>Status</td>
					<td></td>
			  </tr>
				<?php foreach ($forms as $key => $form):?>
				<tr>
					<td><?=$form->od_date?></td>
					<td><?=$form->users->id?></td>
					<td><?=$form->users->name?></td>
					<td><?=$form->od_templates->title?></td>
					<td><?=$form->od_concerned_person->od_person_name?></td>
					<td><strong><div class="od_status_<?=$form->id?>"><?=$form->approved_by ? 'APPROVED' : 'PENDING'?></div></strong></td>
					<?php if(!$form->approved_by): ?>
					<td>
						<button  data-record_id="<?=$form->id?>"  class='btn btn-success set_od_approve_status'>
							Approve
						</button>
					</td>
				<?php else: ?>
					<td>
							-
					</td>
				<?php endif; ?>	
				</tr>
					
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('admin/partials/footer') ?>