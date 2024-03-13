<?php

namespace Meeting\App\Repository;

use Meeting\App\Entity\Meeting;
use Meeting\Core\Database;

class MeetingRepository
{
    public function __construct(private Database $database)
    {
    }

    public function findForUser(int $userId, string $startDate, string $endData): array
    {
        $sql = "SELECT * FROM `meetings` WHERE user_id = :user_id and (date between :start and :end);";

        $conn = $this->database->connection();

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'start' => $startDate,
            'end' => $endData,
            'user_id' => $userId,
        ]);


        return $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Meeting::class);
    }


    public function save(array $data)
    {
        /** @var Database $db */
        $connection = $this->database->connection();

        $connection->beginTransaction();

        try {
            $sql = "
            INSERT INTO `meetings` (start_time, end_time, date, user_id)
            VALUES (:start, :end, :date, :user_id)
            ";


            $this->database->query($sql, [
                'start' => $data['start'],
                'end' => $data['end'],
                'date' => $data['date'],
                'user_id' => $data['user_id'],
            ]);


            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollBack();

            throw $e;
        }

    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM meetings WHERE id=?';
        $this->database->connection()->prepare($sql)->execute([$id]);
    }

}