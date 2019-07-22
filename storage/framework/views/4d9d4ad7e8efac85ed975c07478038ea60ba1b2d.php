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
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>List Barang Yang Tersedia <button class="btn btn-sm btn-success" type="submit" style="margin-left:20px;">Proses Transaksi</button><a class="btn btn-sm btn-primary" style="margin-left:10px;" href="<?php echo e(route('users.riwayat')); ?>">History Belanja</a><a class="btn btn-sm btn-danger" style="margin-left:40.3%;" href="<?php echo e(route('users.logout')); ?>">Log Out</a></h2>
		         </div>
	       </div>
      </div>

      <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
          <p><?php echo e($message); ?></p>
        </div>
      <?php endif; ?>


      <table id="table"  class="table table-bordered" style="margin-top:15px;">
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


        <?php $i=0 ?>
        <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($barang->kodeBarang); ?></td>
            <td><?php echo e($barang->namaBarang); ?></td>
            <td><?php echo e($barang->stock); ?></td>
            <td><?php echo e($barang->hargaJual); ?></td>
            <td><?php echo e($barang->kategory); ?></td>
            <td>
              <input style="margin-left:5px;" type="checkbox" name="val[]" value="<?php echo e($barang->id); ?>"/>
            </td>
          </tr>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </thead>
      </table>
      <?php echo Form::close(); ?>

      



  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
      $(document).ready( function () {
        $('#table').DataTable({
          processing: true,
          serverSide: true,
        });
      } );
    </script>
    
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>