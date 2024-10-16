function confirmDelete(id, url) {
    return new Promise((resolve, reject) => {
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
                            Swal.fire("Silindi!", response.message, "success");
                            resolve("success"); // Başarı durumunda promise çözümlenir
                        } else {
                            Swal.fire({
                                title: "Hata!",
                                text: response.message || errorMessage,
                                icon: "error",
                            });
                            reject("error"); // Hata durumunda promise reddedilir
                        }
                    },
                    error: function () {
                        Swal.fire("Hata!", "Silme işlemi başarısız.", "error");
                        reject("error"); // AJAX hatasında promise reddedilir
                    },
                });
            } else {
                reject("cancelled"); // Kullanıcı iptal ederse promise reddedilir
            }
        });
    });
}

function confirmStatusChange(currentStatus, dataId, type, url) {
    return new Promise((resolve, reject) => {
        Swal.fire({
            title: "Durumu değiştirmek istediğinize emin misiniz?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet, değiştir!",
            cancelButtonText: "İptal",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        id: dataId,
                        type: type,
                        status: currentStatus,
                    },
                    success: (response) => {
                        if (response.status == "success") {
                            Swal.fire("Başarılı!", response.message, "success");
                            resolve("success");
                        } else {
                            Swal.fire({
                                title: "Hata!",
                                text:
                                    response.message ||
                                    "Durum değişikliği başarısız.",
                                icon: "error",
                            });
                            reject("error");
                        }
                    },
                    error: function () {
                        Swal.fire(
                            "Hata!",
                            "Durum değişikliği başarısız.",
                            "error"
                        );
                        reject("error");
                    },
                });
            } else {
                reject("cancelled");
            }
        });
    });
}
