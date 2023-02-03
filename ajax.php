<script>
// to show existing data from fb table
$(document).ready(function() {
    $.ajax({
        url: "show.php",
        type: "POST",
        cache: false,
        success: function(data) {
            $('#table').html(data)
        }
    });

    //saving new book
    //button i   - event     - function
    $('#add-save').on('click', function() {
        //variable that will contain values from the input field
        var add_title = $('#add_title').val();
        var add_author = $('#add_author').val();
        var add_date = $('#add_date').val();
        var add_pub = $('#add_pub').val();
        var add_genre = $('#add_genre').val();

        if (add_title != "" && add_author != "" && add_date != "" && add_pub != "" && add_genre != "") {

            $.ajax({
                url: "add.php",
                type: "POST",
                cache: false,
                data: {
                    add_title: add_title,
                    add_author: add_author,
                    add_date: add_date,
                    add_pub: add_pub,
                    add_genre: add_genre
                },
                success: function(dataResult) {
                    var data = JSON.parse(dataResult);

                    if (data.statusCode == 200) {
                        alert("Book Added Succesfuly");
                        location.reload();
                    } 
                    else if (data.statusCode == 201) {
                        alert("Error");
                    }
                }
            });
        } else {
            alert("Fields are empty");
        }
    });

    // view book
    $(function(){
        $('#view_modal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var view_id = button.data('id');
            var view_title = button.data('title');
            var view_author = button.data('author');
            var view_date = button.data('date');
            var view_pub = button.data('pub');
            var view_genre = button.data('genre');
            var modal = $(this);
            modal.find('#view_title').val(view_title);
            modal.find('#view_author').val(view_author);
            modal.find('#view_date').val(view_date);
            modal.find('#view_pub').val(view_pub);
            modal.find('#view_genre').val(view_genre);
        })
    });

    // edit book
    $(function(){
        $('#edit_modal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var edit_id = button.data('id');
            var edit_title = button.data('title');
            var edit_author = button.data('author');
            var edit_date = button.data('date');
            var edit_pub = button.data('pub');
            var edit_genre = button.data('genre');
            var modal = $(this);
            modal.find('#edit_id').val(edit_id);
            modal.find('#edit_title').val(edit_title);
            modal.find('#edit_author').val(edit_author);
            modal.find('#edit_date').val(edit_date);
            modal.find('#edit_pub').val(edit_pub);
            modal.find('#edit_genre').val(edit_genre);
        })
    });

    // edit book - save changes
    $(document).on('click', '#edit_save', function(){
        $.ajax({
            url: "edit.php",
            type: "POST",
            cache: false,
            data: {
                edit_id: $('#edit_id').val(),
                edit_title: $('#edit_title').val(),
                edit_author: $('#edit_author').val(),
                edit_date: $('#edit_date').val(),
                edit_pub: $('#edit_pub').val(),
                edit_genre: $('#edit_genre').val()
            },
            success: function(dataResult) {
                var data = JSON.parse(dataResult);

                if (data.statusCode == 200) {
                    alert("Succesfully Change");
                    location.reload();
                } 
                else if (data.statusCode == 201) {
                    alert("Error");
                }
            }
        })
    })

    //delete btn
    $(document).on('click', '#delete', function(){
        var $rowtodelete = $(this).parent().parent();
        $.ajax({
            url: "delete.php",
            type: "POST",
            cache: false,
            data:{
                delete_item: $(this).attr('data-id')                
            },
            success: function(dataResult) {
                var data = JSON.parse(dataResult);
                if (data.statusCode == 200) {
                    $rowtodelete.fadeOut();
                    // location.reload();
                } 
                else if (data.statusCode == 201) {
                    alert("Error");
                }
            }
        })
    })

    // search
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});
</script>

