<?php $__env->startSection('content'); ?>
  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
			            <h2>Data Barang <a class="btn btn-sm btn-success" style="margin-left:20px;" href="<?php echo e(route('barangs.create')); ?>">Tambah Data Barang +</a><a class="btn btn-sm btn-primary" style="margin-left:10px;" href="<?php echo e(route('barangs.pembelian')); ?>">Lihat Transaksi Pembelian</a><a class="btn btn-sm btn-danger" style="margin-left:48.5%;" href="<?php echo e(route('admin.logout')); ?>">Log Out</a></h2>
             </div>
	       </div>
      </div>

      <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
          <p><?php echo e($message); ?></p>
        </div>
      <?php endif; ?>

      <table class="table table-bordered" name="tables" style="margin-top:15px;">
        <tr>
          <th>No.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Stock Barang</th>
          <th>Harga Jual</th>
          <th>Kategory</th>

          <th width="140px">Actions</th>
        </tr>

        <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($barang->kodeBarang); ?></td>
            <td><?php echo e($barang->namaBarang); ?></td>
            <td><?php echo e($barang->stock); ?></td>
            <td><?php echo e($barang->hargaJual); ?></td>
            <td><?php echo e($barang->kategory); ?></td>
            <td>
              
              <a class="btn btn-sm btn-warning" href="<?php echo e(route('barangs.edit', $barang->id)); ?>">Edit</a>

              <?php echo Form::open(['method' => 'DELETE', 'route'=>['barangs.destroy', $barang->id], 'style'=> 'display:inline']); ?>

              <?php echo Form::submit('Delete',['class'=> 'btn btn-sm btn-danger']); ?>

              <?php echo Form::close(); ?>

            </td>
          </tr>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
      <?php echo $barangs->links(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>