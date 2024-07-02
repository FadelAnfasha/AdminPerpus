document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('photo');
    const fileChosen = document.getElementById('file-chosen');
    const imagePreview = document.getElementById('image-preview');

    // Menangani file input
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                // Menampilkan nama file yang dipilih
                fileChosen.textContent = file.name;

                // Menampilkan preview gambar
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    imagePreview.setAttribute('src', reader.result);
                    imagePreview.classList.remove('hidden');
                });
                reader.readAsDataURL(file);
            } else {
                // Reset preview dan label jika tidak ada file yang dipilih
                fileChosen.textContent = 'Pilih file';
                imagePreview.classList.add('hidden');
            }
        });
    }

    //==========ANGGOTA==========

    // STORE ALERT
    const memberForm = document.getElementById('store-member-form');
    if (memberForm) {
        memberForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data buku sudah benar?');

            if (userConfirmed) {
                memberForm.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    // UPDATE ALERT
    const updateMember = document.getElementById('member-update-form');
    if (updateMember) {
        updateMember.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data anggota sudah benar?');

            if (userConfirmed) {
                updateMember.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //==========BUKU==========
    
    // STORE ALERT
    const bookForm = document.getElementById('store-book-form');
    if (bookForm) {
        bookForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data buku sudah benar?');

            if (userConfirmed) {
                bookForm.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //UPDATE ALERT
    const updateBook = document.getElementById('book-update-form');
    if (updateBook) {
        updateBook.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data anggota sudah benar?');

            if (userConfirmed) {
                updateBook.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //==========PENULIS===========

    // STORE ALERT
    const authorForm = document.getElementById('store-author-form');
    if (authorForm) {
        authorForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data buku sudah benar?');

            if (userConfirmed) {
                authorForm.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //UPDATE ALERT
    const updateAuthor = document.getElementById('author-update-form');
    if (updateAuthor) {
        updateAuthor.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data anggota sudah benar?');

            if (userConfirmed) {
                updateAuthor.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //==========PENERBIT===========

    // STORE ALERT
    const publisherForm = document.getElementById('store-publisher-form');
    if (publisherForm) {
        publisherForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data buku sudah benar?');

            if (userConfirmed) {
                publisherForm.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //UPDATE ALERT
    const updatePublisher = document.getElementById('publisher-update-form');
    if (updatePublisher) {
        updatePublisher.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data anggota sudah benar?');

            if (userConfirmed) {
                updatePublisher.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //==========RAK BUKU===========

    // STORE ALERT
    const bookshelfForm = document.getElementById('store-bookshelf-form');
    if (bookshelfForm) {
        bookshelfForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data buku sudah benar?');

            if (userConfirmed) {
                bookshelfForm.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //UPDATE ALERT
    const updateBookshelf = document.getElementById('bookshelf-update-form');
    if (updateBookshelf) {
        updateBookshelf.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data anggota sudah benar?');

            if (userConfirmed) {
                updateBookshelf.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //==========PINJAM==========
    
    // STORE ALERT
    const borrowForm = document.getElementById('store-borrow-form');
    if (borrowForm) {
        borrowForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data buku sudah benar?');

            if (userConfirmed) {
                borrowForm.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //UPDATE ALERT
    const updateBorrow = document.getElementById('borrow-update-form');
    if (updateBorrow) {
        updateBorrow.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirimkan secara langsung

            const userConfirmed = confirm('Apakah data anggota sudah benar?');

            if (userConfirmed) {
                updateBorrow.submit(); // Mengirimkan formulir jika pengguna mengkonfirmasi
            }
        });
    }

    //TANGGAL PINJAM
    // document.getElementById('store-borrow-form').addEventListener('submit', function(event) {
    //     // Get the input values
    //     const borrowDateInput = document.getElementById('borrowDate');
    //     const returnDateInput = document.getElementById('datepicker-range-end');
        
    //     // Convert the dates from MM/DD/YYYY to YYYY/MM/DD
    //     const borrowDate = new Date(borrowDateInput.value);
    //     const returnDate = new Date(returnDateInput.value);
        
    //     // Format the dates to YYYY-MM-DD
    //     const formattedBorrowDate = borrowDate.toISOString().split('T')[0];
    //     const formattedReturnDate = returnDate.toISOString().split('T')[0];
        
    //     // Set the new values to the input fields
    //     borrowDateInput.value = formattedBorrowDate;
    //     returnDateInput.value = formattedReturnDate;
    // });
    
});
