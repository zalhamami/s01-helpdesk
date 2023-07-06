var selectOption = document.getElementById('selectOption');

// Tangkap elemen <div> dengan ID "calendarContainer"
var calendarContainer = document.getElementById('calendarContainer');

// Tambahkan event listener untuk menangkap perubahan opsi
selectOption.addEventListener('change', function() {
    var selectedValue = this.value;

    // Kosongkan konten kalender sebelumnya
    calendarContainer.innerHTML = '';

    // Tampilkan kalender yang sesuai dengan opsi yang dipilih
    if (selectedValue === '1') {
        // Tampilkan kalender Tipe A
        calendarContainer.innerHTML = '<h2>Kalender Tipe A</h2>';
        // Tambahkan kode untuk menampilkan kalender Tipe A di sini
    } else if (selectedValue === '2') {
        // Tampilkan kalender Tipe B
        calendarContainer.innerHTML = '<h2>Kalender Tipe B</h2>';
        // Tambahkan kode untuk menampilkan kalender Tipe B di sini
    } else if (selectedValue === '3') {
        // Tampilkan kalender Tipe C
        calendarContainer.innerHTML = '<h2>Kalender Tipe C</h2>';
        // Tambahkan kode untuk menampilkan kalender Tipe C di sini
    }
});