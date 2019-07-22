<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="pull-left">
          <h2>Detail Barang </h2><br>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-12">
        <div class="form-group">
          <p>Kode Barang : <strong><?php echo e($barang->kodeBarang); ?></strong></p>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <p>Nama Barang : <strong><?php echo e($barang->namaBarang); ?></strong></p>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <p>Stock Barang : <strong><?php echo e($barang->stock); ?></strong></p>

        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <p>Harga Jual   : <strong><?php echo e($barang->hargaJual); ?></strong></p>

        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <p>Kategory   : <strong><?php echo e($barang->kategory); ?></strong></p>
        </div>
      </div>
    </div>
      <a class="btn btn-sm btn-primary" href="<?php echo e(route('barangs.index')); ?>">Kembali</a>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>