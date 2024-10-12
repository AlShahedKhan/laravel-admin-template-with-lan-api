$(document).ready(function() {
    console.log("JavaScript code is running!");
    // Rest of the code...
});

$(document).ready(function() {
    // Handle "Create New" button click event
    $('#create-new').click(function() {
        $('#save-button').val("create-public-table");
        $('#public_table_id').val('');
        $('#public_table_form').trigger("reset");
        $('#modelHeading').html("Create New Public Table");
        $('#public_table_modal').modal('show');
    });

    // Handle form submit event
    $('#public_table_form').on('submit', function(event) {
        event.preventDefault();
        var actionUrl = '';
        var method = '';

        // Determine whether we're creating a new record or updating an existing one
        if ($('#save-button').val() == "create-public-table") {
            actionUrl = "{{ route('manage-public.store') }}";
            method = 'post';
        } else {
            var id = $('#public_table_id').val();
            actionUrl = "/manage-public/" + id;
            method = 'put';
        }

        // Send Ajax request to save/update record
        $.ajax({
            url: actionUrl,
            method: method,
            data: $('#public_table_form').serialize(),
            success: function(response) {
                $('#public_table_form').trigger("reset");
                $('#public_table_modal').modal('hide');
                $('#public-table').DataTable().ajax.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    // Handle "Edit" button click event
    $('body').on('click', '.edit-public-table', function() {
        var public_table_id = $(this).data('id');
        $.get("{{ route('manage-public.index') }}" + '/' + public_table_id + '/edit', function(
        data) {
            $('#modelHeading').html("Edit Public Table");
            $('#save-button').val("edit-public-table");
            $('#public_table_modal').modal('show');
            $('#public_table_id').val(data.id);
            $('#table_number').val(data.table_number);
            $('#targeted_runs').val(data.targeted_runs);
            $('#targeted_overs').val(data.targeted_overs);
        });
    });

    // Handle "Delete" button click event
    $('body').on('click', '.delete-public-table', function() {
        var public_table_id = $(this).data("id");
        if (confirm("Are you sure you want to delete this public table?")) {
            $.ajax({
                type: "delete",
                url: "{{ route('manage-public.destroy', ':id') }}".replace(':id',
                    public_table_id),
                success: function(response) {
                    $('#public-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });

    // Initialize DataTable
    $('#public-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('manage-public.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'table_number',
                name: 'table_number'
            },
            {
                data: 'targeted_runs',
                name: 'targeted_runs'
            },
            {
                data: 'targeted_overs',
                name: 'targeted_overs'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });
});