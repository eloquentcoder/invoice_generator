<?php

declare(strict_types=1);

namespace Eloquentcoder\InvoiceGenerator\Providers;

use Eloquentcoder\InvoiceGenerator\Contracts\InvoiceGeneratorContract;
use Eloquentcoder\InvoiceGenerator\InvoiceGenerator;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

final class InvoiceGeneratorServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->publishes(
            paths: [
                __DIR__ . "../../config/invoice_number.php"
            ],
            groups: 'invoice-number'
        );
    }

    public function register(): void
    {
        $this->app->singleton(InvoiceGeneratorContract::class, fn () => new InvoiceGenerator(hash: new Hashids(minHashLength: 5)));
    }
}
