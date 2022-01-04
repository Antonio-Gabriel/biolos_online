<?php

namespace Vendor\models;

use DateTime;
use Vendor\models\Client;
use Vendor\models\Provider;
use Vendor\models\Product;

class Purchase
{
    public int $id;
    public Client $cliend;
    public Provider $provider;
    public Product $productId;
    public DateTime $datePurshase;
}
