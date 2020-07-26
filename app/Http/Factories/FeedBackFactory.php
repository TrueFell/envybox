<?php


namespace App\Http\Factories;


use App\Http\FeedBackRepositories\Database;
use App\Http\FeedBackRepositories\File;
use App\Http\Interfaces\FeedBackRepositoryInterface;
use phpDocumentor\Reflection\Types\Void_;

class FeedBackFactory
{
    public const REPOSITORIES = [
        'database' => Database::class,
        'file' => File::class
        ];

    private function getRepository(string $name = null): FeedBackRepositoryInterface
    {
        $name  = $name?:env('FEEDBACK_REPOSITORY');
        $class = self::REPOSITORIES[$name];
        return new $class;
    }
    public function create($content): void
    {
        $repository = $this->getRepository();
        $repository->make($content);
    }
}
