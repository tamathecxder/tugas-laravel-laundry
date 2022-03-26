<form action="{{ route('barang.status', $barang->id) }}" method="post">
    @csrf
    <select name="status" id="status"  class="form-select border form-select-sm status-barang">
        <option value="{{ $barang->status }}"selected>{{ $barang->status }}</option>
        <option disabled>----- UPDATE STATUS -----</option>
        @foreach ($status_barang as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>
</form>
