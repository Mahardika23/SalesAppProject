@extends('sidebar')

@section('content')

  <h1><i class="fas fa-store-alt mr-2 pt-2"></i>Profil</h1><hr>

    <table class="table table-borderless table-light">
      <tbody>
        <tr>
          <td style="width: 50px">Nama</td>
          <td style="width: 2px">:</td>
          <td>{{ $data['distributor']['nama_distributor'] }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td style="width: 2px">:</td>
          <td>{{ $data['distributor']['alamat_distributor'] }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td style="width: 2px">:</td>
          <td>{{ $data['distributor']['email_distributor'] }}</td>
        </tr>
      </tbody>
    </table>

@endsection
