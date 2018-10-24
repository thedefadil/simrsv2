<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">M_poly Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Jenispoly</td><td><?php echo $jenispoly; ?></td></tr>
	    <tr><td>Ref Bpjs</td><td><?php echo $ref_bpjs; ?></td></tr>
	    <tr><td>Aktif</td><td><?php echo $aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('m_poly') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>