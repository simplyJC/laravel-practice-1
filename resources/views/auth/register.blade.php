<x-layout>

<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <h1 class="text-3xl text-center">Register  New Account</h1>
    <div class="mx-auto max-w-lg">
        <form action="{{ route('register') }}" method="POST" class="mb-0 space-y-4">
            @csrf
            <div  class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="w-full rounded-lg border border-gray-200 p-3 text-sm  @error('username') border-red-500 @enderror" value="{{ old('username')}}" placeholder="Enter your username" 
              />

                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="w-full rounded-lg border border-gray-200 p-3 text-sm @error('email') border-red-500 @enderror" value="{{ old('email') }}" 
                     placeholder="Enter your email" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="w-full rounded-lg border border-gray-200 p-3 text-sm 
                @error('password') border-red-500 @enderror" placeholder="Enter your password"  />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded-lg border border-gray-200 p-3 text-sm @error('password_confirmation')@enderror" placeholder="Confirm your password"  />
            </div>
            <button class="w-full rounded-lg bg-blue-500 py-3 px-3 text-center text-sm font-medium text-white" type="submit">Register</button>
        </form>
    </div>
</div>

</x-layout>