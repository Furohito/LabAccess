<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengajuan</title>
</head>
<body>
<p>Halo {{ $pengajuan->nama }},</p>
<p>Terima kasih telah mengajukan peminjaman. Klik tombol di bawah untuk mengonfirmasi pengajuan Anda.</p>
<a href="{{ $url }}" class="btn btn-primary">Konfirmasi Pengajuan</a>

</body>
</html>
l