<?php


namespace App\Http\FeedBackRepositories;


use App\FeedBack;
use App\Http\Interfaces\FeedBackRepositoryInterface;

class Database implements FeedBackRepositoryInterface
{
    public function make($content): void
    {
        FeedBack::create($content);
    }

}
