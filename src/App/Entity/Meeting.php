<?php

namespace Meeting\App\Entity;

class Meeting
{
    private int $id;
    private ?string $title;
    private ?string $description;
    private string $start_time;
    private string $end_time;
    private string $date;
    private int $user_id;
    private string $created_at;



    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStartTime(): string
    {
        return $this->start_time;
    }

    public function setStartTime(string $startTime): void
    {
        $this->start_time = $startTime;
    }

    public function getEndTime(): string
    {
        return $this->end_time;
    }

    public function setEndTime(string $endTime): void
    {
        $this->end_time = $endTime;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

}