<x-app-layout>
  <div class="attendance-search">
    <form action="{{ route('attendance') }}" method="GET">
      <input type="hidden" name="pre_date" class="search-form" id="pre_date" value=" {{ $date }}">
      <button type="submit" for="pre_date" class="search-form_button">＜</button>
    </form>
    <span class="search-text">{{ $date }}</span>
    <form action="{{ route('attendance') }}" method="GET">
      <input type="hidden" name="post_date" class="search-form" id="post_date" value=" {{ $date }}">
      <button type="submit" for="post_date" class="search-form_button">＞</button>
    </form>
  </div>

  <div class="attendance-wrapper">
          <table class="attendance-table">
            <thead>
              <tr>
                <th class="attendance-table_th">名前</th>
                <th class="attendance-table_th">勤務開始</th>
                <th class="attendance-table_th">勤務終了</th>
                <th class="attendance-table_th">休憩時間</th>
                <th class="attendance-table_th">勤務時間</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($attendances as $attendance)
                <tr>
                  <td class="attendance-table_td">{{ $attendance->user->name }}</td>
                  <td class="attendance-table_td">{{ $attendance->start_time }} </td>
                  <td class="attendance-table_td">{{ $attendance->end_time }}</td>
                  <td class="attendance-table_td">{{ $attendance->total_rest_time }}</td>
                  <td class="attendance-table_td">
                    @if (isset($attendance->total_rest_time))
                      {{ $attendance->total_work_time }}
                    @else
                      {{ $attendance->work_time }}
                    @endif
                  </td>
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
