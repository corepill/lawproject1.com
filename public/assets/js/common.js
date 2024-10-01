function confirmDelete(id, url) {
    Swal.fire({
        title: "Silmek istediğinize emin misiniz?",
        text: "Bu işlem geri alınamaz!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Evet, sil!",
        cancelButtonText: "İptal",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url + "/" + id,
                type: "DELETE",
                success: (response) => {
                    if (response.status === "success") {
                        Swal.fire("Silindi!", response.message , "success");
                        document.querySelector(`tr[data-id="${id}"]`).remove();
                    } else {
                        Swal.fire({
                            title: "Hata!",
                            text: response.message || errorMessage,
                            icon: "error",
                        });
                    }
                },
                error: function () {
                    Swal.fire("Hata!", "Silme işlemi başarısız.", "error");
                },
            });
        }
    });
}
