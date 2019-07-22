<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <h3 style="text-align:center">Selamat Datang Ini Adalah Halaman Admin</h3>
                    <h4 style="text-align:center">Klik Tombol Dibawah Untuk Memulai Bekerja, Jangan Lupa Berdoa Biar Lancar</h4>
                    
                    <a class="btn btn-md btn-success" style="margin-left:43%" href="/admin/barangs">Mulai Bekerja</a>
                </div>



            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>