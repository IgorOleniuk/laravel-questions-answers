<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AcceptAnswerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __invoke(Answer $answer)
    {
        //$this->authorize('accept', $answer);
        $answer->question->acceptBestAnswer($answer);

        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Your have accepted this answer as best answer'
            ]);
        }

        return back();
    }
}
