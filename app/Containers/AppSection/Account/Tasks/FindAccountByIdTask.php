<?php

namespace App\Containers\AppSection\Account\Tasks;

use App\Containers\AppSection\Account\Data\Repositories\AccountRepository;
use App\Containers\AppSection\Account\Events\AccountFoundByIdEvent;
use App\Containers\AppSection\Account\Models\Account;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindAccountByIdTask extends ParentTask
{
    public function __construct(
        protected readonly AccountRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Account
    {
        try {
            $account = $this->repository->find($id);
            AccountFoundByIdEvent::dispatch($account);

            return $account;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
