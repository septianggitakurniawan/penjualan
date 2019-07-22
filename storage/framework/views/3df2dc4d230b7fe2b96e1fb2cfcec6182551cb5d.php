<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <p>Kode Barang : </p>
        <?php echo Form::text('kodeBarang',null,['placeholder'=>'Kode Barang','class'=>'form-control']); ?>

      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <p>Nama Barang : </p>
        <?php echo Form::text('namaBarang',null,['placeholder'=>'Nama Barang','class'=>'form-control']); ?>

      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <p>Stock Barang : </p>
        <?php echo Form::text('stock',null,['placeholder'=>'Stock Barang','class'=>'form-control']); ?>

      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <p>Harga Jual : </p>
        <?php echo Form::text('hargaJual',null,['placeholder'=>'Harga Jual','class'=>'form-control']); ?>

      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <p>Kategory : </p>
        <?php echo Form::text('kategory',null,['placeholder'=>'Kategory','class'=>'form-control']); ?>

      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-sm btn-success" name="button">Submit</button>
      <a class="btn btn-sm btn-primary" href="<?php echo e(route('barangs.index')); ?>">Kembali</a>
    </div>
  </div>
</div>
