<?php

namespace App\Database\Adapters;

use PDO;
use App\Database\Interfaces\Adapter;

class PDOAdapter extends PDO implements Adapter {}