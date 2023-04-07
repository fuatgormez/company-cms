<?php
if(!$this->session->userdata('id')) {
    redirect(base_url().'admin');
}
?>
<section class="content-header">
    <div class="content-header-left">
        <h1>View TODOs</h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo base_url('backend/todo/add'); ?>" class="btn btn-primary btn-sm">Add New</a>
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
                            <th width="50">SL</th>
                            <th>TODO Title</th>
                            <th width="120">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                        foreach ($todo as $row) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['todo_title']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('backend/todo/edit/'.$row['todo_id']); ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo base_url('backend/todo/delete/'.$row['todo_id']); ?>" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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