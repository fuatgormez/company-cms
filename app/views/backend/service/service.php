<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>View Service</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url('backend/service/add'); ?>" class="btn btn-primary btn-sm">Add New</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if($this->session->flashdata('error')):?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
			<?php endif;?>
			<?php if($this->session->flashdata('success')):?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
			<?php endif;?>
	        
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Name</th>
								<th>Photo</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;							
							foreach ($service as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td style="width:200px;"><img src="<?php echo base_url(); ?>public/uploads/service/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" style="width:200px;"></td>									
									<td>
										<a href="<?php echo base_url('backend/service/edit/'.$row['id']); ?>" class="btn btn-primary btn-xs">Edit</a>
										<a href="<?php echo base_url('backend/service/delete/'.$row['id']); ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Delete</a> 
									</td>
								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>