<x-layout>
<h1 class="text-3xl text-center">Register  New Account</h1>
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
        <form action="{{ route('register') }}" method="POST" class="mb-0 space-y-4">
            <div  class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="w-full rounded-lg border border-gray-200 p-3 text-sm" placeholder="Enter your username" required />

            </div>
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="w-full rounded-lg border border-gray-200 p-3 text-sm" placeholder="Enter your email" required />
            </div>
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="w-full rounded-lg border border-gray-200 p-3 text-sm" placeholder="Enter your password" required />
            </div>
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded-lg border border-gray-200 p-3 text-sm" placeholder="Confirm your password" required />
            </div>
            <button class="w-full rounded-lg bg-blue-500 py-3 px-3 text-center text-sm font-medium text-white" type="submit">Register</button>
        </form>
    </div>
</div>

</x-layout>