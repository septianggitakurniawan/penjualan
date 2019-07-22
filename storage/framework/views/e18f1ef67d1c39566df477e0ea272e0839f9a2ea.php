<?php $__env->startSection('content'); ?>
  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>Riwayat Pembelian <a class="btn btn-sm btn-danger" style="margin-left:10px;" href="<?php echo e(route('barangs.index')); ?>">HOME</a></h2>
		         </div>
	       </div>
      </div>


      <table class="table table-bordered" name="tables" style="margin-top:15px;">
        <tr>
          <th style="width:50px;">No.</th>
          <th>Nama</th>
          <th>Tanggal</th>

          <th width="210px">Actions</th>
        </tr>

                <?php $i=0 ?>
                <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e(++$i); ?></td>
                    <td><?php echo e($data->nama); ?></td>
                    <td><?php echo e($data->created_at); ?></td>
                    <td><a class="btn btn-sm btn-primary" href="<?php echo e(route('barangs.detailAdmin', $data->id)); ?>">Detail</a></td>
                  </tr>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>