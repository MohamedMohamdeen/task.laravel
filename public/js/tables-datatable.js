$(function () {
    var dataTable = $('#datatable1').DataTable({

    }
    );

    $(document).on('sidebarChanged', function () {
        dataTable.columns.adjust();
        dataTable.responsive.recalc();
        dataTable.responsive.rebuild();
    });

});

