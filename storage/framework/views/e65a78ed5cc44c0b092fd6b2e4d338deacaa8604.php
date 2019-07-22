<?php $__env->startSection('content'); ?>
  <?php echo Form::open(['method' => 'POST', 'route'=>['users.proses'], 'style'=> 'display:inline']); ?>


  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>Detail Belanja</h2>
             </div>
	       </div>
      </div>

      <?php echo Form::close(); ?>


      <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
          <p><?php echo e($message); ?></p>
        </div>
      <?php endif; ?>

      <table class="table table-bordered" style="margin-top:15px;">
        <tr>
          <th>No.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Kategory</th>
          <th>Total</th>

        </tr>
        <?php $total = 0 ?>
        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($data->kodeBarang); ?></td>
            <td><?php echo e($data->namaBarang); ?></td>
            <td><?php echo e($data->jumlah); ?></td>
            <td><?php echo e($data->harga_per_pcs); ?></td>
            <td><?php echo e($data->kategory); ?></td>
            <td><?php echo e($data->jumlah*$data->harga_per_pcs); ?></td>
            <?php $total += ($data->jumlah * $data->harga_per_pcs) ?>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
        <h4 style="font-family:sans-serif">Total Pembayaran : Rp. <?php echo e($total); ?></h4>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>