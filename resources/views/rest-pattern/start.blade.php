<div class="index-box">
  <form action="{{ route('rest.start') }}" method="POST">
    @csrf
    <button type="submit" class="index-box-button">休憩開始</button>
  </form>
</div>

<div class="index-box">
  <form action="{{ route('rest.end') }}" method="POST">
    @csrf
    <button type="submit" class="index-box-button disabled" disabled>休憩終了</button>
  </form>
</div>