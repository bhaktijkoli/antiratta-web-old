<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddTopicRequest;

use Auth;
use App\University;
use App\Branch;
use App\Course;
use App\Module;
use App\Topic;
use App\ResponseBuilder;

class TopicsController extends Controller
{
  // Add topic
  public function addTopic(AddTopicRequest $request) {
    $topic = new Topic();
    $topic->name = $request->input('topic_name', '');
    $topic->description = $request->input('topic_description', '');
    $topic->module = $request->input('topic_module', '');
    $topic->created_by = Auth::user()->id;
    $topic->updated_by = Auth::user()->id;
    $topic->save();
    return ResponseBuilder::send(true, "", '/');
  }
}
