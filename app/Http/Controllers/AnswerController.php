<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App/Answer;

class AnswerController extends Controller
{
    //
    public function show()
    {
        $answer = Answer::find(1);

        return view('answers/show', compact('answer'));

    }

    public function vote()

    {   //gets the request object 
        $request = request();
        
        //find answer with `id` = 1
        $answer = Answer::find(1);
        
        //create new empty vote object
        $vote = new \App\Vote;

        //set the answer_id of vote to be the same as the id of the voted answer
        // practically specifying the relationship
        $vote->answer_id = $answer->id;
        
        if ($request->input('up')) { // if there is some 'up' in the request ($_GET or $_POST) 
            // set the value of `vote` property of the vote to 1
            $vote->vote = 1;

            // raises the total rating in the asnwer object by 1
            $answer->rating++; 

        } elseif($request->input('down')) {// if there is some 'down' in the request ($_GET or $_POST)
            // set the value of `vote` property of the vote to -1
            $vote->vote = -1;

            //lowers the total rating in the asnwer object by -1
            $answer->rating--; 
        }
        
        $vote->save();
        $answer->save();
        
        return back();
        
    }
}
