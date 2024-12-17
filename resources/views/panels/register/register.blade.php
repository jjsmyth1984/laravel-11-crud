@extends('base')

<div class="flex flex-col justify-center font-[sans-serif] sm:h-screen p-4">
    <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
        <h2 class="text-gray-800 text-center text-2xl font-bold mb-4">Register</h2>
        <form id="register-form" action="{{ route('register-user') }}" method="POST">
            @csrf
            <div class="space-y-6">

                <div class="grid grid-cols-[50%_50%]">
                    <div class="mr-4">
                        <label class="text-gray-800 text-sm mb-2 block">Firstname</label>
                        <input name="firstname" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter firstname" required/>
                    </div>
                    <div class="">
                        <label class="text-gray-800 text-sm mb-2 block">Surname</label>
                        <input name="surname" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter surname" required/>
                    </div>
                </div>

                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Email</label>
                    <input name="email" type="text" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter email" required/>
                </div>
                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Password</label>
                    <input name="password" type="password" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter password" required/>
                </div>
{{--                <div>--}}
{{--                    <label class="text-gray-800 text-sm mb-2 block">Confirm Password</label>--}}
{{--                    <input name="cpassword" type="password" class="text-gray-800 bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter confirm password" />--}}
{{--                </div>--}}

                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                    <label for="remember-me" class="text-gray-800 ml-3 block text-sm">
                        I accept the <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1">Terms and Conditions</a>
                    </label>
                </div>
            </div>
            <div class="!mt-12">
                <button form="register-form" type="submit" class="w-full py-3 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Create an account
                </button>
            </div>
            <p class="text-gray-800 text-sm mt-6 text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline ml-1">Login here</a></p>
        </form>
    </div>
</div>
