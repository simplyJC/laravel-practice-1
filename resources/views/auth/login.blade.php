<x-layout>

<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 ">
    <h1 class="text-3xl text-center">Login Account</h1>
    <div class="mx-auto max-w-lg">
        @if (session('status'))
            <x-flashMessage message="{{session('status')}}" bg_color="bg-green-500"/>                
        @endif
        <form action="{{ route('login') }}" method="POST" class="mb-0 space-y-4">
            @csrf
           
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

            <div class="mb-4 flex justify-between">
                <label for="remember" class="inline-flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-gray-200 text-blue-600 shadow-sm" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                   
                </label> 
                {{--Forgot you Password--}}
                    <a href="{{ route('password.request') }}" class="ml-2 text-sm text-blue-500 hover:text-blue-700">Forgot password?</a>
            </div>
            @error('failed')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
            @enderror
            <button class="w-full rounded-lg bg-blue-500 py-3 px-3 text-center text-sm font-medium text-white" type="submit">Login</button>
        </form>
    </div>
</div>

</x-layout>