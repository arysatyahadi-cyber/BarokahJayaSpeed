@extends('layouts.app')
@section('title','Cari Sparepart')
@section('content')
<h1>Hasil Pencarian untuk "{{ $q }}"</h1>
@if(count($results))
  <ul class="search-results">
    @foreach($results as $r)
      <li>{{ $r['name'] }} — Stok: {{ $r['stock'] }} — Harga: {{ $r['price'] }}</li>
    @endforeach
  </ul>
@else
  <p>Tidak ada hasil.</p>
@endif
@endsection
