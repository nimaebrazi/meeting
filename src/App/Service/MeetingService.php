<?php

namespace Meeting\App\Service;

use Meeting\App\Repository\MeetingRepository;

class MeetingService
{
    public function __construct(private MeetingRepository $meetingRepository)
    {
    }

    public function findForUser(int $userId): array
    {
        $start = new \DateTimeImmutable('Asia/Tehran');
        $end = $start->add(new \DateInterval('P7D'));


        return $this->meetingRepository->findForUser(
            $userId, $start->format('Y-m-d'), $end->format('Y-m-d')
        );
    }

    public function save(array $data)
    {
        $this->meetingRepository->save($data);
    }

    public function delete(int $id)
    {
        $this->meetingRepository->delete($id);
    }
}