<form action="{{ route('absensi.status', $ab->id) }}" method="post" id="formStatusAbsensi">
    @csrf
    <input type="hidden" name="id" value="{{ $ab->id }}">
    <select name="status" id="status" class="form-select border form-select-sm status-absensi">
        <option value="{{ $ab->status }}" selected>{{ $ab->status }}</option>
        <option disabled>----- UPDATE STATUS -----</option>
        @foreach ($status_karyawan as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>
</form>
