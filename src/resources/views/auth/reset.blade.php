@extends('dpanel::auth.layout')

@section('title', 'Reset Password')

@section('body_content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="relative w-11/12 md:w-1/4 mx-auto bg-white p-3 rounded-md shadow-lg">
            <h1 class="text-2xl font-medium text-center ">Reset Password</h1>
            <form action="" method="post" class="grid grid-cols-1 gap-4 md:gap-3 mt-6 mb-2">

                <x-dpanel::input-error-msg />

                @csrf
                <input type="hidden" name="token" value="{{ request()->token }}">

                <div>
                    <label class="font-medium">New Password</label>
                    <input type="password" name="password" placeholder="Password"
                        class="w-full bg-transparent px-2 py-1 border border-slate-300 rounded focus:outline-none" required>
                </div>
                <div>
                    <label class="font-medium">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Password"
                        class="w-full bg-transparent px-2 py-1 border border-slate-300 rounded focus:outline-none" required>
                </div>

                <button
                    class="px-2 py-1 mt-4 shadow-md rounded focus:outline-none text-white bg-violet-500 hover:bg-violet-600 duration-300 font-medium">Update
                    Password</button>
            </form>
            <a href="{{ route(config('dpanel.prefix') . '.login') }}"
                class="text-sm text-gray-400 hover:text-blue-500 duration-300">Login</a>
        </div>
    </div>
@endsection
