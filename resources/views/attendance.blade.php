<x-app-layout>
  <x-slot name="header">
    <h1>日別一覧</h1>
  </x-slot>
  <div>
    <form action="{{ route('attendance') }}" method="GET">
      <button type="submit" name="ago">＜</button>
      {{ $date }}
      <button type="submit" name="later">＞</button>
    </form>
  </div>

  <div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th class="px-6 py-2 text-gray-500">名前</th>
                <th class="px-6 py-2 text-gray-500">勤務開始</th>
                <th class="px-6 py-2 text-gray-500">勤務終了</th>
                <th class="px-6 py-2 text-gray-500">休憩時間</th>
                <th class="px-6 py-2 text-gray-500">勤務時間</th>
                <th class="px-6 py-2 text-gray-500"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($attendances as $attendance)
                <tr class="border-b">
                  <td class="px-6 py-2 text-gray-500">{{ $attendance->user->name }}</td>
                  <td class="px-6 py-2 text-gray-500">{{ $attendance->start_time }} </td>
                  <td class="px-6 py-2 text-gray-500">{{ $attendance->end_time }}</td>
                  <td class="px-6 py-2 text-gray-500">{{ $attendance->total_rest_time }}</td>
                  <td class="px-6 py-2 text-gray-500">
                    @if (isset($attendance->total_rest_time))
                      {{ $attendance->total_work_time }}
                    @else
                      {{ $attendance->work_time }}
                    @endif
                  </td>
                  <td class="px-6 py-2 text-gray-500">{{ $attendance->date }}</td>{{-- 後で消す --}}
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $attendances->links() }}
      </div>

      {{-- 後で消す --}}
      @php
        dump($date);
      @endphp
      @php
        dump($attendances);
      @endphp

</x-app-layout>
