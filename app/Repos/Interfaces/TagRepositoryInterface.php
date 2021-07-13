<?php

namespace App\Repos\Interfaces;

interface TagRepositoryInterface
{
    /**
     * Поиск по тегам
     *
     * @param string $search
     * @return mixed
     */
    public function search(string $search);
}
