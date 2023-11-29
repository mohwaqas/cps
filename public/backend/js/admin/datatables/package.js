(function($) {
    "use strict";
    $(document).ready(function () {
        $('#PackageTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'range_from',
                    name: 'range_from'
                },
                {
                    data: 'range_to',
                    name: 'range_to'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'discount_percentage',
                    name: 'discount_percentage'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
    });
})(jQuery)
