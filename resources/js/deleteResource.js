
$('.delete-resource-button').click(function()
{
    const id = $(this).data('id');
    showAlert(id);

});


function showAlert(id){

    swal({
        title: "Are you sure?",
        text: `Delete user: ${id}`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete)
            {   //deleteUrl to zmienna globalna ktora pochodzi z view
                deleteResource(deleteUrl, id)
            }
        });

}

function deleteResource(url, id) {

    $.ajax({
        url: url + '/' + id,
        method: 'DELETE',
        success: function(result) {
            swal("User was deleted", '', 'success')
                .then((value) => {
                    window.location.reload();
                });
        },
        error: function(serverResponse) {
            if(serverResponse.status === 404){
                swal(   "User not found!", "error", "error");
            }
            else {
                swal("Something went wrong!", "error", "error");
            }
        }

    });

}
