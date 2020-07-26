<?php


namespace App\Http\Interfaces;


interface FeedBackRepositoryInterface
{
    public function make($content): void;
}
