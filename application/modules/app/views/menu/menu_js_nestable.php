<script src="<?php echo base_url() ?>assets/app/plugins/nestable/jquery.nestable-2.js"></script>
<script>
    $(document).ready(function () {

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                    output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate pages
        $('#nestable_pages').nestable({
            group: 1
        }).on('change', this.updateOutput);

        // activate Nestable for list 2
        $('#nestable_category').nestable({
            group: 1
        }).on('change', this.updateOutput);
        $('#nestable_placecategory').nestable({
            group: 1
        }).on('change', this.updateOutput);

        //active plugins
        $('#nestable_modules').nestable({
            group: 1
        }).on('change', this.updateOutput);

        // list menu
        $('#nestable_menu').nestable({
            group: 1
        }).on('change', this.updateOutput);

        $('#menusave').on('click', function (e) {
            updateOutput($('#nestable_menu').data('output', $('#nestable_menu_output')));
            $("#savemenu").submit();
        });

        $('#btnaddmenu').on('click', function (e) {

            $('#nestable_menu ol#main-list').append('<li class="dd-item" data-id="' + $('#nameurl').val() + ';' + $('#url').val() + '"><div class="dd-handle">' + $('#nameurl').val() + '</div></li>');
        })
    });
</script>