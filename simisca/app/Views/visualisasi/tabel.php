<table id="tabel" class="table table-striped table-bordered">
    <thead>
        <tr>
            <?php if (isset($satker)) : ?>
                <?php if (isset($satker[0])) : ?>
                    <?php $key = array_keys($satker[0]) ?>
                    <?php foreach ($key as $k) : ?>
                        <th><?= $k; ?></th>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php else : ?>
                <?php if (isset($pegawai[0])) : ?>
                    <?php $keypegawai = array_keys($pegawai[0]) ?>
                    <?php foreach ($keypegawai as $p) : ?>
                        <th><?= $p; ?></th>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>

        <?php if (isset($satker)) : ?>
            <?php if (isset($key)) : ?>
                <?php foreach ($satker as $s) : ?>
                    <tr>
                        <?php foreach ($key as $k) : ?>
                            <td><?= $s[$k]; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else : ?>
            <?php if (isset($keypegawai)) : ?>
                <?php foreach ($pegawai as $p) : ?>
                    <tr>
                        <?php foreach ($keypegawai as $k) : ?>
                            <td><?= $p[$k]; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tabel').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>