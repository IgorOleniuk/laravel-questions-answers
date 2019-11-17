
<div class="d-fex flex-column vote-controls">
    <a title="This question is useful"
       class="vote-up {{ Auth::guest() ? 'off' : '' }}"
       onclick="event.preventDefault(); document.getElementById('up-vote-question-{{ $model->id }}').submit();"
    >
        <i class="fas fa-caret-up fa-2x"></i>
    </a>
    <form id="up-vote-question-{{ $model->id }}" action="/questions/{{ $model->id }}/vote" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>

    <span class="votes-count">{{ $model->votes_count }}</span>
    <a title="This question is not useful"
       class="vote-down {{ Auth::guest() ? 'off' : '' }}"
       onclick="event.preventDefault(); document.getElementById('down-vote-question-{{ $model->id }}').submit();"
    >
        <i class="fas fa-caret-down fa-2x"></i>
    </a>
    <form id="down-vote-question-{{ $model->id }}" action="/questions/{{ $model->id }}/vote" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>

    <a title="Click to mark as favorite question (Click again to undo)"
       class="favorite mt-2 {{ Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '') }}"
       onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $model->id }}').submit();"
    >
        <i class="fas fa-star fa-2x"></i>
        <span class="favorites-count">{{ $model->favorites_count }}</span>
    </a>
    <form id="favorite-question-{{ $model->id }}" action="/questions/{{ $model->id }}/favorites" method="POST" style="display: none;">
        @csrf
        @if($model->is_favorited)
            @method('DELETE')
        @endif
    </form>
</div>