<x-app-layout>
  <div class="index-container">
    <h2 class="index-title">
      {{ Auth::user()->name }}さんお疲れ様です!
    </h2>

    <div class="index-wrapper">
      <div class="index-box">
        <form action="{{ route('attendance.start') }}" method="POST">
          @csrf
          @method('POST')
          {{-- date_countが 0 の場合 on --}}
          @if ($conf_contents['date_count'] == 0)
            <button type="submit" class="index-box-button">勤務開始</button>
          @else
            <button type="submit" class="index-box-button disabled" disabled>勤務開始</button>
          @endif
        </form>
      </div>
      <div class="index-box">
        <form action="{{ route('attendance.end') }}" method="POST">
          @csrf
          @method('POST')
          {{-- date_countが 0 ではない & end_time が null の場合 on --}}
          @if ($conf_contents['date_count'] != 0 and empty($conf_contents['end_time']))
            <button type="submit" class="index-box-button">勤務終了</button>
          @else
            <button type="submit" class="index-box-button disabled" disabled>勤務終了</button>
          @endif
        </form>
      </div>
      {{-- date_countが 0 の場合 or end_time が null でない場合  double off --}}
      @if ($conf_contents['date_count'] == 0 or !empty($conf_contents['end_time']))
        @include('rest-pattern.no-start-end')
        {{-- start_restが null の場合 or end_rest が null でない場合  start on --}}
      @elseif(empty($conf_contents['start_rest']) or !empty($conf_contents['end_rest']))
        @include('rest-pattern.start')
        {{-- start_restが null でない場合 end on --}}
      @elseif(!empty($conf_contents['start_rest']))
        @include('rest-pattern.end')
      @endif
      </ul>
    </div>
  </div>
  </div>
  {{-- 後で消す  dump($conf_contents);--}}
  @php
  @endphp
  
</x-app-layout>
