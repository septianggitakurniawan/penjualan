<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        
          <h3>Edit Data Barang</h3>
        </div>
      </div>
    </div>

    <?php if(count($errors) > 0): ?>
        <div class="col-md-11">
          <div class="form-group">
            <div class="alert alert-danger" style="margin-left:8%;">
              <strong>Whooops!!! </strong>Terjadi kesalahan dalam inputan anda. <br>
              <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
    <?php endif; ?>

    <?php echo Form::model($barang, ['method'=>'PATCH','route'=>['barangs.update', $barang->id]]); ?>

      <?php echo $__env->make('barangs.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>