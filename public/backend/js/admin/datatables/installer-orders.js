(function($) {
    "use strict";
    $(document).ready(function () {
        $('#InstallerAdvertiseTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#installer-table-url').data("url"),
            columns: [
                {
                    data: 'Order_Number',
                    name: 'Order_Number'
                },
                {
                    data: 'User',
                    name: 'User'
                },
                {
                    data: 'Products',
                    name: 'Products'
                },
                {
                    data: 'types',
                    name: 'types'
                },
                {
                    data: 'GrandTotal',
                    name: 'GrandTotal'
                },
                {
                    data: 'Coupon',
                    name: 'Coupon'
                },
                {
                    data: 'Payment_Method',
                    name: 'Payment_Method'
                },
                {
                    data: 'Status',
                    name: 'Status'
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
