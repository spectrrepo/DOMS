@if( Auth::user()->id !== $post->user->id)
    <a class="edit-link-ava" href="/profile/{{ $post->user->id }}">
        <img src="{{ Storage::url($post->user->img_square )}}" alt="" />
    </a>
    <a class="edit-link-link" href="/profile/{{ $post->user->id }}">
        {{ $post->user->name }}
    </a>
    <div class="clear"></div>
    <hr>
@endif