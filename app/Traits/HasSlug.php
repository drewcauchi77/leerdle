<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function fromSlug(string $slug): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->slug() === $slug) {
                return $case;
            }
        }

        return null;
    }

    public function slug(): string
    {
        return Str::slug($this->name);
    }
}
