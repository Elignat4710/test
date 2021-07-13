<?php

namespace App\Repos\Interfaces;

interface CategoryRepositoryInterface
{
    /**
     * Поиск записей
     *
     * @param string $search
     * @return mixed
     */
    public function search(string $search);
}
