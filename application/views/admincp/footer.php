<div class="container-fluid footer_admin blue_back">
    <div class="col-xs-12 text-center">
        <p> جميع الحقوق محفوظة &copy; <?=date('Y')?> لوحة تحكم | </p>
    </div>
</div>


<script type="text/javascript" src="<?= assets('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= assets('js/bootstrap-datepicker.js') ?>"></script>
<script type="text/javascript" src="<?= assets('js/script.js') ?>"></script>
<script type="text/javascript">
    $('#upload').change(function () {
        // $('.size_alert').remove();
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#blah').show();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $('#url').keyup(function () {
        $('#blah').attr('src', $(this).val());
        $('#blah').show();
    });
</script>
</body>
</html>
