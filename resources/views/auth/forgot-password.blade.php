<x-layout>
@if (session('status'))
    <x-flashMessage message="{{session('status')}}" bg_color="bg-green-500"/>                
@endif
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 ">
    <h1 class="text-3xl text-center">Request a Password Reset</h1>
    <div class="mx-auto max-w-lg">
        <form action="{{route('password.request')}}" method="POST" class="mb-0 space-y-4" x-data="formSubmit" @submit.prevent="submit" >
            @csrf
           
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="w-full rounded-lg border border-gray-200 p-3 text-sm @error('email') border-red-500 @enderror" value="{{ old('email') }}" 
                     placeholder="Enter your email" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button x-ref="btn" class="w-full rounded-lg bg-blue-500 py-3 px-3 text-center text-sm font-medium text-white" type="submit">Submit  Request</button>
        </form>
    </div>
</div>

</x-layout>