<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #DFB787;
  color: white;
}
</style>
</head>
<body>

<h2>Data Meja</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nomor Meja</th>
        <th>Kapasitas</th>
        <th>Lokasi Meja</th>
        <th>Gambar Meja</th>
        <th>Cabang Outlet</th>
    </tr>
  @if (count($meja))
  <?php
    $no = 1;
    foreach ($meja as $mejas) :
  ?>
    <tr>
        <td>{{ $no }}</td>
        <td>{{ $mejas->no_desk }}</td>
        <td>{{ $mejas->capacity }}</td>
        <td>{{ $mejas->lokasi_meja }}</td>
        <td><img src="{{ asset('public/images/' . $mejas->file_upload) }}" alt="Uploaded Image"></td>
        <td>{{ $mejas->branchOutlet->branch_name }}</td>
    </tr>
    <?php
      $no++;
    endforeach;
    ?>
  @else
  <tr>
    <td colspan="3" style="text-align: center">Tidak ada data Meja</td>
  </tr>
  @endif
</table>

</body>
</html>


