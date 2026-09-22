document.addEventListener('DOMContentLoaded', function() {
    fetch('ambil-peminjaman.php')
        .then(response => response.json())
       .then(data => {
           const tabelPeminjaman = document.querySelector('#tabel-peminjaman tbody');
         if (data.length > 0) {
             data.forEach(peminjaman => {
                   const newRow = document.createElement('tr');
                 newRow.innerHTML = `
                     <td>${peminjaman.prasarana}</td>
                     <td>${peminjaman.tanggal}</td>
                     <td>${peminjaman.waktuMulai} - ${peminjaman.waktuSelesai}</td>
                     <td>${peminjaman.fasilitas}</td>
                     <td>${peminjaman.statusPengaju}</td>
                      <td>${peminjaman.nikNim}</td>
                    <td>${peminjaman.noWhatsapp}</td>
                   <td>${peminjaman.penanggungJawab}</td>
                   <td>${peminjaman.keterangan}</td>
                    `;
                    tabelPeminjaman.appendChild(newRow);
                 });
              } else {
                 const newRow = document.createElement('tr');
                 newRow.innerHTML = `<td colspan="9">Tidak ada data peminjaman.</td>`;
                   tabelPeminjaman.appendChild(newRow);
              }
        })
         .catch(error => console.error('Error:', error));
});