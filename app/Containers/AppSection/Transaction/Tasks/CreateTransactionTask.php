<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\Transaction\Events\TransactionCreatedEvent;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateTransactionTask extends ParentTask
{
    public function __construct(
        protected readonly TransactionRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Transaction
    {
        try {
            $transaction = $this->repository->create($data);
            TransactionCreatedEvent::dispatch($transaction);

            return $transaction;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
