@extends('layout.master')
@section('content')
    <!-- component -->
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                        placeholder="Full Name" required />

                    <input type="email" class="block border border-grey-light w-full p-3 rounded mb-4" name="email"
                        placeholder="Email" required />

                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                        placeholder="Password" required />

                    <div class="my-4">
                        <input type="radio" name="gender" id="M" value="M" required>
                        <label for="M">Male</label>
                        <input type="radio" name="gender" id="F" value="F" required>
                        <label for="F">Female</label>
                    </div>

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="fow1"
                        placeholder="Field of Work 1" required />

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="fow2"
                        placeholder="Field of Work 2" required />

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="fow3"
                        placeholder="Field of Work 3" required />

                    <input type="tel" class="block border border-grey-light w-full p-3 rounded mb-4" name="phone" id="phone"
                        placeholder="Phone Number" required>

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="linkedin"
                        placeholder="LinkedIn Username" required />

                    <div class="flex flex-row align-center items-center gap-4 ">
                        <input type="checkbox" name="above18" id="above18" required><p>I am 21 years older and currently working</p>
                    </div>

                    <?php
                        $min_value = 100000;
                        $max_value = 125000;

                        $random_value = rand($min_value, $max_value);
                    ?>
                    <p class="my-2">Payment Fee: {{$random_value}}</p>
                    <input type="hidden" name="random_value" value="{{ $random_value }}">
                    <input type="hidden" name="wallet" value=0>
                    @if(Session()->has('paymentError'))
                    <h2 class="text-red-500 text-xl">
                        {{Session()->get('paymentError')}}
                    </h2>
                    @endif
                    <input type="number" name="payment" id="payment" placeholder="Your Payment..." required>
                    <p>*Extra payment will be automatically be transferred into your account balance.</p>
                    <button type="submit"
                        class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">Register</button>
                </form>
                <div class="text-grey-dark mt-6">
                    Already have an account?
                    <a class="no-underline border-b border-blue text-blue" href="../login/">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
    @endsection
