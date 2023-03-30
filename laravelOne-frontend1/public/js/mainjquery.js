  
$(document).ready(function () {
    // $.noConflict();
    $('#table_search').DataTable({
        //edit show
        "pageLength": 10,
        "lengthMenu": [
            [5, 10, 20, -1],
            [5, 10, 20, "All"]
        ],
    });

});
