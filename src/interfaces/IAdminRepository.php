<?php

namespace Vendor\interfaces;

use Vendor\models\Account;

interface IAdminRepository
{
    public function create(Account $account);
    public function update(Account $account);
    public function get();
    public function getProductsByProvider(int $provider_id);
    public function delete(int $provider_id);
}
