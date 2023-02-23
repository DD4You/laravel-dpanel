<div class="w-full flex flex-col">
    <div class="overflow-x-auto mb-2">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden border-b border-gray-300 rounded">
                <table class="min-w-full divide-y divide-gray-400">

                    <thead class="bg-white text-xs whitespace-nowrap">{{ $thead }}</thead>

                    <tbody class="bg-gray-50 divide-y divide-gray-300 text-gray-600 text-sm">{{ $tbody }}</tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $pagination }}
</div>
