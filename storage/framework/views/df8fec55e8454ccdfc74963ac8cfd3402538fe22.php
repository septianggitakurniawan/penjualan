<?php $__env->startSection('content'); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

  <div class="container">
    <?php echo Form::open(['method' => 'POST', 'route'=>['barangs.addtransaction'], 'style'=> 'display:inline']); ?>


      <div class="row">
	       <div class="col-sm-8">
		         <div class="full-right">
			            <h2>List Barang Yang Tersedia <button class="btn btn-md btn-danger" type="submit" style="margin-left:20px;">Proses Transaksi</button></h2>
		         </div>
	       </div>
      </div>

      <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
          <p><?php echo e($message); ?></p>
        </div>
      <?php endif; ?>


      <table table class="table table-bordered" id="user-table" style="margin-top:15px;">
        <thead>
          <tr>
            <th>NO.</th>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>STOCK BARANG</th>
            <th>HARGA SATUAN (Rp.)</th>
            <th>KATEGORY</th>
            <th width="10px">PILIH</th>
          </tr>

        
        </thead>
      </table>

      <?php echo Form::close(); ?>


      

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
        <?php echo $__env->yieldPushContent('scripts'); ?>

      <script type="text/javascript">
          $(function() {
            $('#user-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '<?php echo e(route('users.getData')); ?>',
              columns :[
                {data:'id'},
                {data:'kodeBarang'},
                {data:'namaBarang'},
                {data:'stock'},
                {data:'hargaJual'},
                {data:'kategory'}
              ]
            });
          });
      </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>