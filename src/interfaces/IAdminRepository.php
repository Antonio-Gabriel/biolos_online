<?php

namespace Vendor\interfaces;

use Vendor\models\Account;

interface IAdminRepository
{
    public function create(Account $account);
    public function update(Account $account);
    public function delete(int $provider_id);

    public function get(int $provider_id);
}
