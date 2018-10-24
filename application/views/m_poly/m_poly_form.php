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
        <h2 style="margin-top:0px">M_poly <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Jenispoly <?php echo form_error('jenispoly') ?></label>
            <input type="text" class="form-control" name="jenispoly" id="jenispoly" placeholder="Jenispoly" value="<?php echo $jenispoly; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Ref Bpjs <?php echo form_error('ref_bpjs') ?></label>
            <input type="text" class="form-control" name="ref_bpjs" id="ref_bpjs" placeholder="Ref Bpjs" value="<?php echo $ref_bpjs; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Aktif <?php echo form_error('aktif') ?></label>
            <input type="text" class="form-control" name="aktif" id="aktif" placeholder="Aktif" value="<?php echo $aktif; ?>" />
        </div>
	    <input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_poly') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>