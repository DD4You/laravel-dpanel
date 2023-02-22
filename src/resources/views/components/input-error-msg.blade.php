@if ($errors->any())
    <div class="border bg-red-50 border-red-500 text-red-500 text-sm rounded px-2 py-1">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
