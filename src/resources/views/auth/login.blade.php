@extends('dpanel::auth.layout')

@section('title', 'DPanel Login')

@push('scripts')
    <script>
        // cuteAlert({
        //     type: "success",
        //     title: "Success Title",
        //     message: "Success Message",
        //     buttonText: "Okay"

        //     type: "question",
        //     title: "Confirm Title",
        //     message: "Confirm Message",
        //     confirmText: "Okay",
        //     cancelText: "Cancel"
        // })
        // cuteToast({
        //     type: "info", // or 'success', 'info', 'error', 'warning'
        //     message: "Checking credentials...",
        //     timer: 7500
        // }).then(() => {
        //     cuteToast({
        //         type: "success", // or 'success', 'info', 'error', 'warning'
        //         message: "Login success",
        //     })
        // })
    </script>
@endpush

@section('body_content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="relative w-11/12 md:w-1/4 mx-auto bg-white p-3 rounded-md shadow-lg">
            <h1 class="text-2xl font-medium text-center ">DPanel Login</h1>
            <form action="{{ route(config('dpanel.prefix') . '.login') }}" method="post"
                class="grid grid-cols-1 gap-4 md:gap-3 mt-6 mb-2">

                <x-dpanel::input-error-msg />

                @csrf
                <div>
                    <label class="font-medium">Username</label>
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"
                        class="w-full bg-transparent px-2 py-1 border border-slate-300 rounded focus:outline-none" required>
                </div>
                <div>
                    <label class="font-medium">Password</label>
                    <input type="password" name="password" placeholder="Password"
                        class="w-full bg-transparent px-2 py-1 border border-slate-300 rounded focus:outline-none" required>
                </div>

                <button
                    class="px-2 py-1 mt-4 shadow-md rounded focus:outline-none text-white bg-violet-500 hover:bg-violet-600 duration-300 font-medium">Login</button>
            </form>
            <a href="{{ route(config('dpanel.prefix') . '.forgot') }}"
                class="text-sm text-gray-400 hover:text-blue-500 duration-300">Forgot
                Password?</a>
        </div>
    </div>
@endsection
