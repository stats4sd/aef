<?php

use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\PurgeTelescopeEntries;

Schedule::command(PurgeTelescopeEntries::class)->daily();
