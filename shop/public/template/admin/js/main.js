$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm("Bạn có chắc chắc xóa"))
    {
        $.ajax({
            type: 'delete',
            dataType: 'JSON',
            data:{id},
            url:url,
            success: function (result){
                if(result.error === false){
                    location.reload();
                }
                else {
                    alert('Xóa lỗi!');
                }
            }
        })
    }
}
