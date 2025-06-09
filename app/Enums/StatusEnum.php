<?php

namespace App\Enums;

enum StatusEnum: string
{
    case New = 'Новый';
    case Confirmed = 'Подтверждено';
    case InProgress = 'В работе';
    case Done = 'Выполнено';
    case Cancelled = 'Отменено';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public static function toArrayWithKeys(): array
    {
        return array_column(self::cases(), 'value', 'value');
    }
}
