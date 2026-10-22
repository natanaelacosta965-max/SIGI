<?php require __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3>Registrar Nuevo Producto</h3>
    <form action="<?= BASE_URL ?>/admin/productos/guardar" method="post">
        <!-- Row 1 -->
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="categoria">Categoria :</label>
                <select name="categoria" id="categoria" class="form-control" required>
                    <option value="">Seleccione...</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= htmlspecialchars((string) $categoria['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="codigo">Codigo :</label>
                <input type="text" class="form-control" name="codigo" id="codigo" maxlength="50" required>
            </div>
            <div class="col-md-4 form-group">
                <label for="nombre">Nombre :</label>
                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" required>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="descripcion">Descripcion :</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="255">
            </div>
            <div class="col-md-4 form-group">
                <label for="precio_venta">Precio Venta :</label>
                <input type="number" class="form-control" name="precio_venta" id="precio_venta" step="0.01" min="0" required>
            </div>
            <div class="col-md-4 form-group">
                <label for="stock_actual">Stock Actual :</label>
                <input type="number" class="form-control" name="stock_actual" id="stock_actual" min="0" required>
            </div>
        </div>

        <!-- Botón de envío (opcional) -->
        <div class="row mt-3">
            <div class="col-md-12 text-end">
                <center>
                    <button type="button" class="btn btn-danger"><i class="fas fa-times"></i> cancelar</button>
                    <button type="reset" class="btn btn-info"><i class="fas fa-trash"></i> limpiar</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> guardar</button>
                </center>
            </div>
        </div>
    </form>
</div>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>