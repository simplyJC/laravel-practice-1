@props(['message',  'bg_color' => 'bg-yellow-500'])
 <div class="{{ $bg_color }} text-white p-4 rounded-lg mb-4">
<p class="text-sm">{{ $message }}</p>
</div>