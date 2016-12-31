<form action="{{ url('/expert/' . $expert->id . '/profile-picture' ) }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <input type="file" name="profile_picture">
    <button type="submit" class="btn btn-xs">Update Profile Picture</button>
</form>