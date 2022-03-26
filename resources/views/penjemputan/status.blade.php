<form action="{{ route('penjemputan.status', $data->id) }}" method="POST">
    @csrf
    {{-- @method('put') --}}
    <select name="status" class="form-select border form-select-sm statusTabel">
        <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
        <option disabled>========== DATA STATUS ==========</option>
        @foreach ($status as $sts)
            <option value="{{ $sts }}">{{ $sts }}</option>
        @endforeach
    </select>
</form>
