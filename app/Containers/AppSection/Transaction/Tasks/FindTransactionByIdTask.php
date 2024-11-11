<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\Transaction\Events\TransactionFoundByIdEvent;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindTransactionByIdTask extends ParentTask
{
    public function __construct(
        protected readonly TransactionRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Transaction
    {
        try {
            $transaction = $this->repository->find($id);
            TransactionFoundByIdEvent::dispatch($transaction);

            return $transaction;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
