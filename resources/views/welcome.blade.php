{{-- @dd($data) --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>

<body>

    <form action="{{ url('test/1') }}" method="get">
        @csrf
        {{-- <input type="text" name="nama"> --}}
        <label for="no-surat">No surat</label>
        <input type="text" name="no_surat">

        <label for="">tanggal surat</label>
        <input type="date" name="tanggal_surat">

        <label for="">tanggal diterima</label>
        <input type="datetime-local" name="tanggal_diterima">

        <label for="">file</label>
        <input type="text" name="file">

        <label for="">status</label>
        <input type="text" name="status">

        <label for="">instansi id</label>
        <input type="text" name="instansi_id">
        <button type="submit">run</button>
    </form>

</body>

</html>
