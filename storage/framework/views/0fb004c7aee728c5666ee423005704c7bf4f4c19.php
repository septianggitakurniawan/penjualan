<?php $__env->startSection('content'); ?>
  <?php echo Form::open(['method' => 'POST', 'route'=>['users.proses'], 'style'=> 'display:inline']); ?>


  <div class="container">
      <div class="row">
	       <div class="col-sm-12">
		         <div class="full-right">
               <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <input style="margin-left:5px;" type="hidden" name="val[]" value="<?php echo e($barang->id); ?>"/>


               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            <h2>List Pesananan Anda <button class="btn btn-sm btn-danger" style="margin-left:20px;" type="submit">Kirim Pesanan</button></h2>
             </div>
	       </div>
      </div>

      <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
          <p><?php echo e($message); ?></p>
        </div>
      <?php endif; ?>

      <div class="col-md-12">
        <div class="form-group">
          <p>Nama : </p>
          <?php echo Form::text('nama',Auth::user()->name,['placeholder'=>'Masukan Nama','class'=>'form-control','readonly']); ?>

        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <p>Alamat : </p>
          <?php echo Form::text('alamat',null,['placeholder'=>'Masukan Alamat','class'=>'form-control']); ?>

        </div>
      </div>


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
          <th>Harga Barang Per PCS</th>
          <th>Kategory</th>

        </tr>
        <?php $i=0 ?>
        <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($barang->kodeBarang); ?></td>
            <td><?php echo e($barang->namaBarang); ?></td>
            <td width="130px;"><?php echo Form::text('jumlah[]',null,['placeholder'=>'Berapa pcs','class'=>'form-control']); ?></td>
            <td><?php echo e($barang->hargaJual); ?></td>
            <td><?php echo e($barang->kategory); ?></td>

          </tr>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
      </table>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>