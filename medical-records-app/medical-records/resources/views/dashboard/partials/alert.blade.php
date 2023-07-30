@if(session('success') || session('delete') || session('error') || session('info'))
  <div class="h-11 w-8/12 flex justify-between items-center 
  @if (session('success'))
      {{ 'bg-green-300/60 border-green-500' }}          
  @endif
  @if (session('delete'))
      {{ 'bg-yellow-300/60 border-yellow-500' }}          
  @endif
  @if (session('info'))
      {{ 'bg-blue-300/60 border-blue-500' }}          
  @endif
  @if (session('error'))
      {{ 'bg-red-300/60 border-red-500' }}          
  @endif
  rounded-lg border  px-3 mx-auto">
    <span class="">
      {{ session('success') }}
      {{ session('delete') }}
      {{ session('info') }}
      {{ session('error') }}
    </span>
    <span class="cursor-pointer notify text-gray-600">X</span>
  </div>
@endif