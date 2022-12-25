@extends('dpanel.layouts.app')

@section('title', 'Dashboard')

@push('css')
    <x-dpanel::chart.js>
        <script src="//code.highcharts.com/modules/cylinder.js"></script> {{-- For Funnel & Pyramid Chart --}}
        <script src="//code.highcharts.com/modules/funnel3d.js"></script> {{-- For Funnel & Pyramid Chart --}}
        <script src="//code.highcharts.com/modules/pyramid3d.js"></script> {{-- For Pyramid Chart --}}
        <script src="https://code.highcharts.com/modules/networkgraph.js"></script> {{-- For Graph Tree Chart --}}
    </x-dpanel::chart.js>
@endpush

@section('body_content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="bg-gray-800 rounded-md flex shadow-lg w-full overflow-hidden">
            <span class="p-3 bg-violet-500 flex items-center">
                <i class='bx bx-message-alt-detail text-3xl'></i>
            </span>
            <div class="p-3">
                <p class="font-medium">Heading 1</p>
                <small class="text-gray-300">0</small>
            </div>
        </div>

        <div class="bg-gray-800 rounded-md flex shadow-lg w-full overflow-hidden">
            <span class="p-3 bg-yellow-500 flex items-center">
                <i class='bx bx-message-alt-detail text-3xl'></i>
            </span>
            <div class="p-3">
                <p class="font-medium">Heading 2</p>
                <small class="text-gray-300">0</small>
            </div>
        </div>
        <div class="bg-gray-800 rounded-md flex shadow-lg w-full overflow-hidden">
            <span class="p-3 bg-green-500 flex items-center">
                <i class='bx bx-message-alt-detail text-3xl'></i>
            </span>
            <div class="p-3">
                <p class="font-medium">Heading 3</p>
                <small class="text-gray-300">0</small>
            </div>
        </div>
        <div class="bg-gray-800 rounded-md flex shadow-lg w-full overflow-hidden">
            <span class="p-3 bg-red-500 flex items-center">
                <i class='bx bx-message-alt-detail text-3xl'></i>
            </span>
            <div class="p-3">
                <p class="font-medium">Heading 4</p>
                <small class="text-gray-300">0</small>
            </div>
        </div>
        <div class="bg-gray-800 rounded-md flex shadow-lg w-full overflow-hidden">
            <span class="p-3 bg-orange-500 flex items-center">
                <i class='bx bx-message-alt-detail text-3xl'></i>
            </span>
            <div class="p-3">
                <p class="font-medium">Heading 5</p>
                <small class="text-gray-300">0</small>
            </div>
        </div>

    </div>

    {{-- Charts --}}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        @php
            $columnName1 = $chart['column']['name'];
            $columnData1 = $chart['column']['data'];
            $donutData1 = $chart['donut']['data'];
            $pieData1 = $chart['pie']['data'];
            $pyramidData1 = $chart['pyramid']['data'];
            $funnelData1 = $chart['pyramid']['data'];
            $treeData1 = $chart['tree']['data'];
        @endphp
        <x-dpanel::chart.column chartId="column1" chartTitle="Column Test Chart" chartTooltip="Data"
            chartAxisTitleY="Optional Y Axis Title" :chartData="$columnData1" :chartNames="$columnName1" />

        <x-dpanel::chart.donut chartId="donut1" chartTitle="Donut Test Chart" :chartData="$donutData1" chartName="Total Data" />

        <x-dpanel::chart.pie chartId="pie1" chartTitle="Pie Test Chart" chartName="Share" :chartData="$pieData1" />
        <x-dpanel::chart.pyramid chartId="pyramid1" chartTitle="Pyramid Test Chart" chartName="Total Click"
            :chartData="$pyramidData1" />
        <x-dpanel::chart.funnel chartId="funnel1" chartTitle="Funnel Test Chart" chartName="Total Click"
            :chartData="$funnelData1" />

        <x-dpanel::chart.graph-tree chartId="graphTree1" chartTitle="Graph Tree Test Chart"
            chartRootItem="{{ array_keys($chart['tree']['data'][0])[0] }}" :chartData="$treeData1" />


    </div>
    {{-- Charts End --}}

    {{-- Bottom Sheet --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div onclick="showBottomSheet('bottomSheet')"
            class="bg-gray-800 rounded-md text-center shadow-lg w-full cursor-pointer">
            <p class="font-medium py-2">Open Bottom Sheet</p>
        </div>

        <div onclick="showBottomSheet('bottomSheet-T')"
            class="bg-gray-800 rounded-md text-center shadow-lg w-full cursor-pointer">
            <p class="font-medium py-2">Open Bottom Sheet (Top)</p>
        </div>

        <div onclick="showBottomSheet('bottomSheet-L')"
            class="bg-gray-800 rounded-md text-center shadow-lg w-full cursor-pointer">
            <p class="font-medium py-2">Open Bottom Sheet (Left)</p>
        </div>

        <div onclick="showBottomSheet('bottomSheet-R')"
            class="bg-gray-800 rounded-md text-center shadow-lg w-full cursor-pointer">
            <p class="font-medium py-2">Open Bottom Sheet (Right)</p>
        </div>

    </div>

    <x-dpanel::modal.bottom-sheet sheetId="bottomSheet" title="Bottom Sheet">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">
            <h1 class="text-2xl">Default Bottom Sheet</h1>
        </div>
    </x-dpanel::modal.bottom-sheet>

    <x-dpanel::modal.bottom-sheet sheetId="bottomSheet-T" bsPosition="T" title="Bottom Sheet">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">
            <h1 class="text-2xl">Bottom Sheet Top</h1>
        </div>
    </x-dpanel::modal.bottom-sheet>

    <x-dpanel::modal.bottom-sheet sheetId="bottomSheet-L" bsPosition="L" title="Bottom Sheet">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">
            <h1 class="text-2xl">Bottom Sheet Left</h1>
        </div>
    </x-dpanel::modal.bottom-sheet>

    <x-dpanel::modal.bottom-sheet sheetId="bottomSheet-R" bsPosition="R" title="Bottom Sheet">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">
            <h1 class="text-2xl">Bottom Sheet Right</h1>
        </div>
    </x-dpanel::modal.bottom-sheet>


    <x-dpanel::modal.bottom-sheet-js hideOnClickOutside="true" />
    {{-- Bottom Sheet End --}}

@endsection
