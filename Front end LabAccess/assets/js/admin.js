document.addEventListener('DOMContentLoaded', function() {
    const tabelPeminjaman = document.querySelector('#tabel-peminjaman tbody');

    function loadPeminjaman() {
        fetch('ambil-peminjaman.php')
            .then(response => response.json())
            .then(data => {
                tabelPeminjaman.innerHTML = ''; // Clear previous data

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
                             <td>${peminjaman.status}</td>
                            <td>
                                <button class="btn btn-success btn-sm btn-terima" data-id="${peminjaman.id}" data-status="approved">Terima</button>
                                <button class="btn btn-danger btn-sm btn-tolak" data-id="${peminjaman.id}" data-status="rejected">Tolak</button>
                           </td>
                        `;
                        tabelPeminjaman.appendChild(newRow);
                    });
                } else {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `<td colspan="10">Tidak ada data peminjaman.</td>`;
                    tabelPeminjaman.appendChild(newRow);
               }


          //event listener untuk button approve dan reject
              tabelPeminjaman.addEventListener('click', function (event) {
                  if (event.target.classList.contains('btn-terima') || event.target.classList.contains('btn-tolak')) {
                      const button = event.target;
                        const id = button.getAttribute('data-id');
                        const status = button.getAttribute('data-status');
                         updateStatusPeminjaman(id, status)
                       }
               })
           })
         .catch(error => console.error('Error:', error));
      }


    function updateStatusPeminjaman(id, status) {
           fetch('update-status-peminjaman.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                 },
                body: new URLSearchParams({
                    id: id,
                    status: status
                }).toString()
          })
           .then(response => response.json())
         .then(result => {
                if (result.success) {
                   alert("Status peminjaman telah diupdate.")
                   loadPeminjaman(); // Refresh data after update
                 } else {
                      alert(result.message)
                }
         })
         .catch(error => console.error('Error:', error))
    }
   loadPeminjaman(); // Load initial data on page load
});