<!DOCTYPE html>
<html lang="en">

@extends('admin.layouts.admin')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login Page</title>
</head>

<body>
    <div class="flex justify-center items-center h-screen">
        <div class="w-[90%] h-[90%] shadow-xl rounded-xl border-2 border-gray-100 grid grid-cols-2">
            <div class="w-full h-full rounded-l-xl bg-gradient-to-r from-cyan-500 to-blue-500">
                <!-- Optional content -->
            </div>
            <div class="h-full flex flex-col justify-center px-12">
                <label class="text-center text-xl font-bold mb-16">LOGIN FORM</label>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border p-2 rounded-lg mb-6" type="text" required
                        placeholder="Enter Email Here...">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required class="w-full border p-2 rounded-lg mb-12" required
                        placeholder="Enter Password Here...">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button class="bg-blue-500 h-[40px] w-full rounded-full text-white font-bold" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
