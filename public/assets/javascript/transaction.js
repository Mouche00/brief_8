

$(document).ready(function() {

    let table = $('#table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'../app/controllers/transaction.php'
        },
        'columns': [
            { data: 'id' },
            { data: 'type' },
            { data: 'amount' },
            { data: 'account_id' },
            { data: 'id',
                render : function(data, type, row) {
                    return '<td class="border-x-2 border-b-2 border-black"><button class="delete" type="button" data-id=' + data + '><i class="fa-solid fa-trash-can"></i></button></td><td class="border-x-2 border-b-2 border-black"><button class="edit" type="button" data-id=' + data + '><i class="fa-solid fa-pen-nib"></i></button></td>'
                } 
            },
            
         ]
    });

    table.draw();
    $('#table').css("width", "100%");

    $(document).on('click', '.delete', function(){
        let id = $(this).data('id');
        // $row = $(this).parents("tr");
        $.ajax({
            url: '../app/controllers/transaction.php',
            type: 'GET',
            data: {
                'delete': 1,
                'id': id,
            },
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
            }
        });
    });

    $(document).on('click', '#add', function(){
        $("#overlay").addClass("opacity-50 z-10");
        $("#form-wrapper").addClass("scale-100");
        $('#edit-form').addClass("hidden");
        // console.log(1);
    });

    $(document).on('click', '#overlay', function(){
        $("#form-wrapper").removeClass("scale-100");
        $("#overlay").removeClass("opacity-50 z-10");
        $('#edit-form').removeClass("hidden");
        $('#add-form').removeClass("hidden");
        // console.log(1);
    });

    $(document).on('submit', '#add-form', function(e){
        e.preventDefault();
        // let name = $('#name').val();
        // let logo = $('#logo').val();
        let formData = new FormData(this);
        console.log(formData.get('name'));
        formData.append('add', 1);
        $.ajax({
            url: '../app/controllers/transaction.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
                $("#form-wrapper").removeClass("scale-100");
                $("#overlay").removeClass("opacity-50 z-10");
                $('#edit-form').removeClass("hidden");
                $('#add-form').removeClass("hidden");
                $('#id').val('');
                $('#type').val('');
                $('#amount').val('');
                $('#account_id').val('');
            }
        });
    });

    $(document).on('click', '.edit', function(){
        let id = $(this).data('id');
        $.ajax({
            url: '../app/controllers/transaction.php',
            type: 'GET',
            data: {
                'edit': 1,
                'id': id,
            },
            success: function(response){
                // remove the deleted comment
                let data = JSON.parse(response);
                $("#overlay").addClass("opacity-50 z-10");
                $("#form-wrapper").addClass("scale-100");
                $('#add-form').addClass("hidden");
                $('#edit-id').val(data['id']);
                $('#edit-type').val(data['type']);
                $('#edit-amount').val(data['amount']);
                $('#edit-account_id').val(data['account_id']);

            }
        });
    });

    $(document).on('submit', '#edit-form', function(e){
        e.preventDefault();
        // let id = $('#id').val();
        // let name = $('#name').val();
        // let logo = $('#logo').val();
        let formData = new FormData(this);
        formData.append('edit', 1);
        $.ajax({
            url: '../app/controllers/transaction.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                // remove the deleted comment
                // $row.remove();
                table.draw();
                $('#table').css("width", "100%");
                $("#form-wrapper").removeClass("scale-100");
                $("#overlay").removeClass("opacity-50 z-10");
                $('#edit-form').removeClass("hidden");
                $('#add-form').removeClass("hidden");
            }
        });
    });

});