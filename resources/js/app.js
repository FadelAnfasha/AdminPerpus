// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'bootstrap';
import './bootstrap';

import 'flowbite';

// Pastikan ini adalah kode untuk menginisialisasi datepicker
document.addEventListener('DOMContentLoaded', function() {
    const datepickerEl = document.querySelector('#default-datepicker');
    if (datepickerEl) {
        new Datepicker(datepickerEl, {
            format: 'yyyy-mm-dd',  // Format tanggal yang ditampilkan
            minDate: new Date(),  // Tanggal minimum adalah hari ini
        });
    }
});

import $ from 'jquery';
import 'select2/dist/js/select2.min.js';
import 'select2/dist/css/select2.min.css';

$(document).ready(function() {
    $('#member_id').select2({
        placeholder: "Cari Nama Peminjam",
        allowClear: true
    });
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


