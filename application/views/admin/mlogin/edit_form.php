<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_include/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_include/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_include/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_include/breadcrums.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/mlogin/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
<?php foreach ($mlogin as $mlogin): ?>
						<form action="<?php base_url('admin/mlogin/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $mlogin->NIP ?>" />

							<div class="form-group">
								<label for="name">Username*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="nip" placeholder="Mlogin name" readonly value="<?php echo $mlogin->NIP ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<span class="label">Unit</span>

								<select name="unit" id="inputUnit" class="form-control">
									<option value="">-- Select One --</option>
									<?php foreach ($unit as $unit): ?>
										<option value="<?php echo $unit->kode_unit ?>"><?php echo $unit->nama_unit ?></option>
										<?php endforeach; ?>
								</select>
								
							</div>
							<div class="form-group">
								<span class="label">Roles</span>

								<select name="roles" id="inputRoles" class="form-control">
									<option value="">-- Select One --</option>
									<?php foreach ($m_roles as $m_roles): ?>
										<option value="<?php echo $m_roles->kode ?>"><?php echo $m_roles->jenis ?></option>
										<?php endforeach; ?>
								</select>
								
							</div>

							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" name="pass" id="inputPass" class="form-control" required="required" title="" placeholder="********">
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>


							<!--<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Description*</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="Product description..."><?php echo $product->description ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>-->

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
<?php endforeach; ?>
					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_include/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_include/scrolltop.php") ?>

		<?php $this->load->view("admin/_include/js.php") ?>

</body>

</html>
