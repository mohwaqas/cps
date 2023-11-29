(function($) {
    "use strict";
    $(document).ready(function () {
        var oTable = $('#BlogTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: $('#table-url').data("url"),
                data: function (data) {
                    data.package_id = $('#package_id').val();
                }
            },
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },

                 {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'package',
                    name: 'package'
                },
                {
                    data: 'orders',
                    name: 'orders',
                    orderable: false
                },
                {
                    data: 'approve',
                    name: 'approve',
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });

        $('#search-form').on('submit', function(e) {
            oTable.draw();
            e.preventDefault();
        });
    });
})(jQuery)
