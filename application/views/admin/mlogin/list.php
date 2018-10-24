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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/mlogin/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NIP</th>
										<th>PASSWPRD</th>
										<th>ROLES</th>
										<th>Status</th>
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($mlogin as $mlogin): ?>
									<tr>
										<td width="150">
											<?php echo $mlogin->NIP ?>
										</td>
										<td>
											<?php echo $mlogin->PWD ?>
										</td>
										<td>
											<?php echo $mlogin->jenis ?>
										</td>
										
										<td class="small">
											<?php echo $mlogin->DEPARTEMEN ?></td>
										<td width="250">
											<a href="<?php echo site_url('admin/mlogin/edit/'.$mlogin->NIP) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/mlogin/delete/'.$mlogin->NIP) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("admin/_include/modal.php") ?>

	<?php $this->load->view("admin/_include/js.php") ?>

</body>

</html>
