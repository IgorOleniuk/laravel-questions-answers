
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answerCount . " " . str_plural('Answer', $answerCount) }}</h2>
                    @include('layouts._messages')
                </div>
                <hr>
                @foreach ($answers as $answer)
                    @include('answers._answer')
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>


