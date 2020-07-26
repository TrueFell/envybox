<?php


namespace App\Http\FeedBackRepositories;


use App\Http\Interfaces\FeedBackRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class File implements FeedBackRepositoryInterface
{
    const FEEDBACKS_PATH = 'feedbacks.txt';

    public function make($content): void
    {
        $content = json_encode($content);

        $this->save($content);
    }

    public function save($content): void
    {
        !Storage::exists(self::FEEDBACKS_PATH) ? Storage::put(self::FEEDBACKS_PATH, $content) : Storage::append(self::FEEDBACKS_PATH, $content);
    }
}
