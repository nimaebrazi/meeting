<?php

namespace Meeting\App\Http\Controllers;


use Meeting\App\Service\MeetingService;
use Meeting\Core\App;
use Meeting\Core\Validator;
use Meeting\Util;

class MeetingController
{
    public function index(): string
    {
        /** @var MeetingService $meetingService */
        $meetingService = App::resolve('meetingService');
        $userMeetings = $meetingService->findForUser(1);


        return view('meeting/index', [
            'timing' => Util::getTiming(),
            'weekDays' => Util::getWeekDays(),
            'userMeetings' => $userMeetings
        ]);
    }


    public function save()
    {
        $input = inputs();

        $isValid = $this->validateOnSave($input);

        if (!$isValid) {
            abort(422);
        }


        // TODO: assign user_id from http auth_header. now we assume our user_id is 1.
        $input['user_id'] = 1;

        /** @var MeetingService $meetingService */
        $meetingService = App::resolve('meetingService');
        $meetingService->save($input);

        return view('meeting/index', [
            'timing' => Util::getTiming(),
            'weekDays' => Util::getWeekDays()
        ]);
    }

    private function validateOnSave($input)
    {
        if (Validator::isNull($input['start']) || Validator::isNull($input['end']) || Validator::isNull($input['date'])) {
            return false;
        }

        if ($input['start'] >= $input['end']) {
            return false;
        }

        return true;
    }
}