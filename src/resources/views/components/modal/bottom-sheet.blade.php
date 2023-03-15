<div id="{{ $sheetId }}" class="bottom-sheet">

    <div class="bottom-sheet-content {{ $bsPosition ?? 'B' }} px-3 pt-3 pb-12">

        <div class="absolute right-3">
            <i onclick="closeBottomSheet(this)"
                class='bx bx-x border border-red-500 w-6 h-6 text-2xl flex items-center justify-center bg-red-50 rounded-full text-red-500 cursor-pointer'></i>
        </div>

        <h1 id="{{ $sheetId }}-title" class="text-center font-bold uppercase">{{ $title }}</h1>
        <hr class="my-2">

        <div class="px-3 md:px-0">
            {{ $slot }}
        </div>

    </div>

</div>
