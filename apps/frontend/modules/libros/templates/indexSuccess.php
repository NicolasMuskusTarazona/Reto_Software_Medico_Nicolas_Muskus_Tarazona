<h1>Catálogo Open Library</h1>

<form method="get" action="<?php echo url_for('@libros') ?>" class="form-inline mb-3">
    <input type="text" name="q" value="<?php echo htmlspecialchars($query) ?>"
        class="form-control" placeholder="Buscar por titulo o autor" />
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<?php if ($error): ?>
    <div class="alert alert-danger"><?php echo $error ?></div>
<?php elseif (empty($libros)): ?>
    <p>No se encontraron resultados para "<?php echo htmlspecialchars($query) ?>".</p>
<?php else: ?>

    <table id="tabla-libros" class="table table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Autor(es)</th>
                <th>Primera publicacion</th>
                <th>Ediciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?php echo isset($libro['title']) ? htmlspecialchars($libro['title']) : '—' ?></td>
                    <td>
                        <?php
                            if (isset($libro['author_name']) && count($libro['author_name']) > 0):
                                echo htmlspecialchars(implode(', ', iterator_to_array($libro['author_name'])));
                            else:
                                echo '—';
                            endif;
                        ?>
                    </td>
                    <td><?php echo isset($libro['first_publish_year']) ? htmlspecialchars($libro['first_publish_year']) : '—' ?></td>
                    <td><?php echo isset($libro['edition_count']) ? htmlspecialchars($libro['edition_count']) : '0' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <?php use_stylesheet('https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') ?>
    <?php use_javascript('https://code.jquery.com/jquery-3.6.0.min.js') ?>
    <?php use_javascript('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js') ?>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#tabla-libros').DataTable({
            "language": {
                "search": "Buscar:",
                "paginate": { "next": "Siguiente", "previous": "Anterior" },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"}
        });
    });

    </script>
<?php endif; ?>