<form action="{{ url('/expert/' . $expert->id . '/call' ) }}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-xs">-</button>
</form>