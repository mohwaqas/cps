(function($) {
    "use strict";
    $(document).ready(function () {
        $('#ProductTable').DataTable({
            processing: true,
            serverSide: true,
            "pageLength": 100,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                {
                    data: 'PrimaryImage',
                    name: 'PrimaryImage'
                },
                {
                    data: 'ProductName',
                    name: 'ProductName'
                },
                 {
                    data: 'Quantity',
                    name: 'Quantity'
                },
                {
                    data: 'Category',
                    name: 'Category'
                },
                {
                    data: 'Brand',
                    name: 'Brand'
                },
                {
                    data: 'BronzePrice',
                    name: 'BronzePrice'
                },
                {
                    data: 'SilverPrice',
                    name: 'SilverPrice'
                },
                {
                    data: 'GoldPrice',
                    name: 'GoldPrice'
                },
                {
                    data: 'PlatinumPrice',
                    name: 'PlatinumPrice'
                },
                {
                    data: 'Price',
                    name: 'Price'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'Status',
                    name: 'Status'
                },
                
            ]
        });
    });
})(jQuery)
