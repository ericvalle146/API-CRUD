<?php

declare(strict_types=1);

namespace App\Actions\Task;

use App\DTOs\Task\FetchTaskListDTO;
use App\Models\Task;

class FetchTasksList
{
    public function __construct(
        private FetchTaskListDTO $fetch_task_list_dto
    ) {}

    public function execute()
    {
        return Task::query()->paginate(
            $this->fetch_task_list_dto->per_page,
            ['*'],
            'page',
            $this->fetch_task_list_dto->page
        );
    }
}
