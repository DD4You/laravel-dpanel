@extends('dpanel::layouts.guest')

@section('title', 'Forgot Password')

@section('body_content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="relative w-11/12 md:w-1/4 mx-auto bg-gray-800 p-3 rounded-md shadow-lg">
            <h1 class="text-2xl font-medium text-center ">Forgot Password</h1>

            <form action="" method="post" class="grid grid-cols-1 gap-4 md:gap-3 mt-6 mb-2">

                @if ($errors->any())
                    <div class="border bg-red-50 border-red-500 text-red-500 text-sm rounded px-2 py-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @csrf
                <div>
                    <label class="font-medium">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email Address"
                        class="w-full bg-transparent px-2 py-1 border border-slate-300 rounded focus:outline-none">
                </div>

                <button
                    class="px-2 py-1 mt-4 shadow-md rounded focus:outline-none bg-violet-500 hover:bg-violet-600 duration-300 font-medium">Send
                    Reset Email</button>
            </form>
            <a href="{{ route(config('dpanel.prefix') . '.login') }}"
                class="text-sm text-gray-200 hover:text-blue-500 duration-300">Login</a>
        </div>
    </div>
@endsection
