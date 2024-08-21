<div class="form-group">
    <select class="form-ctrl form-control" onchange="location = this.value;">
        @foreach($orders as $order)
            <option value="{{ route('getorder', [$order->id]) }}" {{ ($orderdata->id ?? null) == $order->id ? 'selected' : '' }}>
                {{ $order->solar_name }}
            </option>
        @endforeach
    </select>
</div>
