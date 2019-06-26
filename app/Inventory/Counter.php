<?php

namespace App\Inventory;

use App\Repositories\TransactionRepository;

class Counter
{
	protected $repository;

	public function __construct( TransactionRepository $repository ) {
		$this->repository = $repository;
	}

	/**
	 * @return int
	 */
	public function countTotalQuantity() {
		// todo return an integer representing the amount of items (quantity) left from the Repository.
		return $this->repository->transactions->sum('quantity');
	}

	/**
	 * @param int $quantity
	 *
	 * @return double
	 */
	public function calculateCostPrice( $quantity = 10 ) {
		// todo return an double representing the cost price for $quantity.
        $totalValue = 0;
        foreach ($this->repository->transactions as $value) {
            $totalValue += $value->quantity * $value->unit_cost_price;
        }
        $totalQuantity = $this->repository->transactions->sum('quantity');
		return ($totalValue / $totalQuantity) * $quantity;
	}

	/**
	 * @return double
	 */
	public function calculateTotalValue() {
		// todo return an double representing the value of all transactions.
        $totalValue = 0;
        foreach ($this->repository->transactions as $value) {
            $totalValue += $value->quantity * $value->unit_cost_price;
        }
        return $totalValue;
	}
}