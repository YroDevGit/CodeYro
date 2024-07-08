$(document).ready(function() {
    // CY_TABLE
    var exportFilename = $('#CY_TABLE').attr('export') || 'Exported_Data';

    $('#CY_TABLE').DataTable({
        "responsive": true, // Enable responsive extension
        "ordering": false, // Disable sorting
        "dom": 'Bfrtip', // Define the position of the buttons
        "buttons": [
            {
                extend: 'copy',
                className: 'btn btn-primary',
                filename: exportFilename + '_Copy_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'csv',
                className: 'btn btn-primary', 
                filename: exportFilename + '_CSV_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'excel',
                className: 'btn btn-primary',
                filename: exportFilename + '_Excel_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'pdf',
                className: 'btn btn-primary', 
                filename: exportFilename + '_PDF_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'print',
                className: 'btn btn-primary', 
                filename: exportFilename + '_Print_' + new Date().toISOString().slice(0, 10)
            }
        ],
        "language": {
            "search": "Search:" 
        }
    });
    $('#CY_TABLE').addClass('display responsive nowrap bordered-table');
});