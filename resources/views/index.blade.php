<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}さんお疲れ様です。
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="">
        <ul>
          <li>
            <form action="{{ route('attendance.start') }}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" class="btn btn-primary">出勤</button>
            </form>
          </li>
          <li>
            <form action="{{ route('attendance.end') }}" method="POST">
              @csrf
              @method('POST')
              <button type="submit" class="btn btn-success">退勤</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
</x-app-layout>