<footer class="noPrint">
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p><?php echo date("Y"); ?> &copy; Auth Medical</p>
        </div>
        <div class="float-end">
            <p>Versão 1.0</p>
        </div>
    </div>
</footer>
<script src="./dist/assets/js/app.js"></script>
<script src="./dist/assets/js/pages/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $('document').ready( function () {
        $('.tableDataJqueryLista').DataTable({
            "order": [[ 7, 'desc' ]],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'
            }
        });

        $('.tableDataJqueryOther').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'
            }
        });
    });
</script>