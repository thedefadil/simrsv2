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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/mlogin/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/mlogin/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="NAMADOKTER" placeholder="Nama Dokter" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Status*</label>
								<select name="st_aktif" id="inputPrice" class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>" placeholder="Status Keaktifan" >
									<option value="">-- Select One --</option>
									<option value="0">Aktif</option>
									<option value="1">NonAktif</option>
								</select>
								
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>


							

							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

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
