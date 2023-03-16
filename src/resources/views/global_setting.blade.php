@extends('dpanel.layouts.app')

@section('title', 'Global Settings')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernoteInline').summernote({
                // airMode: true,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
@endpush

@section('body_content')
    <div class="bg-white rounded mb-3 shadow flex justify-between items-center">
        <p class="font-medium px-2 py-1">Global Settings</p>
    </div>

    <form action="{{ route(config('dpanel.prefix') . '.global-settings.store') }}" method="POST"
        class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 md:mt-3" enctype="multipart/form-data">
        @csrf

        @foreach (settings()->getAll() as $item)
            <div @if ($item->type == settings()->longTextType()) class="md:col-span-2" @endif>
                <label class="capitalize text-lg font-medium">{{ $item->label }}</label>
                <input type="hidden" name="key[]", value="{{ $item->key }}" required>

                @if ($item->type == settings()->fileType())
                    <div class="w-full p-1 bg-white rounded shadow flex items-center gap-2">
                        <a href="{{ $item->value ? asset('storage/' . $item->value) : 'https://placehold.jp/100x100.png?text=No%20Image' }}"
                            target="_blank"><img class="w-8 h-8 rounded-sm"
                                src="{{ $item->value ? asset('storage/' . $item->value) : 'https://placehold.jp/100x100.png?text=No%20Image' }}"
                                alt=""></a>
                        <input type="file" name="value-{{ $item->key }}" class="focus-within:outline-none">
                    </div>
                @else
                    @if ($item->type == settings()->longTextType())
                        <textarea name="value-{{ $item->key }}" placeholder="{{ $item->hint }}" rows="3"
                            class="summernoteInline w-full p-1 rounded focus-within:outline-none">{{ $item->value }}</textarea>
                    @else
                        <input type="text" placeholder="{{ $item->hint }}" name="value-{{ $item->key }}"
                            value="{{ $item->value }}"
                            class="w-full p-1 rounded bg-white shadow focus-within:outline-none">
                    @endif
                @endif
            </div>
        @endforeach
        <button class="bg-gray-800 rounded md:col-span-2 py-1 text-white font-medium uppercase text-lg">Update
            Global Settings</button>

    </form>
@endsection
