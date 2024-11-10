<x-layout>
    <h1>Please  Verify email through the email we've sent  you.</h1>
    <p>Didn't  get the email?   </p>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button class="w-full p-3 text-white bg-blue-500 rounded-lg">Resend Email</button>
    </form>
</x-layout>