@extends('layouts.main')
@section('content')
<div class="from">
  <form action="/action_page.php">
    <label for="fname">Nama Barang </label>
    <input type="text" class="input" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Jumlah Barang</label>
    <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

    <label for="lname">Photo</label>
    <input type="file" id="lname" class="input" name="lastname" placeholder="Your last name..">

  
    <input type="submit" value="Submit">
  </form>
</div>


@endsection