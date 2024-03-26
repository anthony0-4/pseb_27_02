<?php $__env->startSection('conteudo'); ?>
<?php $__env->startSection('titulo', 'Formulário de Aluno'); ?>
<?php
    if (!empty($dado->id)) {
        $route = route('aluno.update', $dado->id);
    } else {
        $route = route('aluno.store');
    }
?>

<h3>Formulário de Aluno</h3>
<form action="<?php echo e($route); ?>" method="post" enctype="">

    <?php echo csrf_field(); ?>

    <?php if(!empty($dado->id)): ?>
        <?php echo method_field('put'); ?>
    <?php endif; ?>

    <input type="hidden" name="id"
        value="<?php if(!empty($dado->id)): ?> <?php echo e($dado->id); ?><?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>

    <label for="">Nome</label><br>
    <input type="text" name="nome" class="form-control"
        value="<?php if(!empty($dado->nome)): ?> <?php echo e($dado->nome); ?><?php elseif(!empty(old('nome'))): ?><?php echo e(old('nome')); ?><?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>

    <label for="">Telefone</label><br>
    <input type="text" name="telefone" class="form-control"
        value="<?php if(!empty($dado->telefone)): ?> <?php echo e($dado->telefone); ?><?php elseif(!empty(old('telefone'))): ?><?php echo e(old('telefone')); ?><?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>

    <label for="">CPF</label><br>
    <input type="text" name="cpf" class="form-control"
        value="<?php if(!empty($dado->cpf)): ?> <?php echo e($dado->cpf); ?><?php elseif(!empty(old('cpf'))): ?><?php echo e(old('cpf')); ?><?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>

    <label for="">Categorias</label><br>
    <select name="categoria_id" class="form-select">
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->id); ?>"><?php echo e($item->nome); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select><br>

    <?php
        $nome_imagem = !empty($dado->imagem)? $dado->imagem : "sem_imagem.jpg"
    ?>
    <label for="">Imagem</label><br>
    <img src="/storage/<?php echo e($nome_imagem); ?>" width="300px" alt="imagem">
    <input type="file" name="imagem" class="form-control"
        value="<?php if(!empty($dado->imagem)): ?> <?php echo e($dado->imagem); ?><?php elseif(!empty(old('imagem'))): ?><?php echo e(old('imagem')); ?><?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="<?php echo e(url('aluno')); ?>" class="btn btn-primary">Voltar</a>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pweb2_2024_1\resources\views/aluno/form.blade.php ENDPATH**/ ?>