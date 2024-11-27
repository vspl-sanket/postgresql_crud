        
        
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#add_user_form').validate({
        rules: {
            f_name: {
                required: true
            },
            l_name: {
                required: true
            },
            b_date: {
                required: true
            },
            mobile: {
                required: true
            },
            address: {
                required: true
            },
            city: {
                required: true
            },
            pincode: {
                required:true
            },
        },
        submitHandler: function(form) {
            insert_user()
        }
    });


    function insert_user(){

        $.ajax({
            url: '<?php echo $base_url; ?>'+ '/user_api_insert.php', 
            type: "POST",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({ 
                f_name: $('#f_name').val(), 
                l_name: $('#f_name').val(),
                dob:$('#b_date').val(),
                mob:$('#mobile').val(),
                address:$('#address').val(),
                city:$('#city').val(),
                pincode:$('#pincode').val()
            }),
            success: function (result) {
                Swal.fire({
                    title: "Success!",
                    text: "New User Added.",
                    icon: "success"
                });
                location.reload();
                
            },
            error: function (err) {
                alert("connection failed");
            }
        });
    }

    function handle_swal(user_id){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't to delete this user.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                delete_user(user_id);
            }
        });
    }


    function delete_user(user_id){
        $.ajax({
            url: '<?php echo $base_url; ?>'+ '/user_api_delete.php', 
            type: "DELETE",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({ 
                user_id: user_id
            }),
            success: function (result) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                location.reload();
            },
            error: function (err) {
                alert("connection failed");
            }
        });
    }
</script>

        
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
            <div class="col-12 col-md">
                <ul class="list-unstyled text-small">
                </ul>
            </div>
            </div>
        </footer>
    </div>     
  </body>
</html>

