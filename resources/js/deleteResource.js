
$('.delete-resource-button').click(function()
{
    const id = $(this).data('id');
    // resourceName is global js variable that comes from view.blade.php
    showAlert(id, resourceName);

});

// resourceName ==> for example user / product
function showAlert(id, resourceName){

    swal({
        title: "Are you sure?",
        text: `Delete ${resourceName}: ${id}`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete)
            {   //deleteUrl is global js variable that comes from view.blade.php
                deleteResource(deleteUrl, id, resourceName)
            }
        });

}

// resourceName ==> for example user / product
function deleteResource(url, id, resourceName) {

    $.ajax({
        url: url + '/' + id,
        method: 'DELETE',
        success: function(result) {
            swal(`${resourceName} deleted`, '', 'success')
                .then((value) => {
                    window.location.reload();
                });
        },
        error: function(serverResponse) {
            if(serverResponse.status === 404){
                swal(   `${resourceName} not found!`, "error", "error");
            }
            else {
                swal("Something went wrong!", "error", "error");
            }
        }

    });

}
