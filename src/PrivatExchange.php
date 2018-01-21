<?php

namespace APIAnswer;


class PrivatExchange
{
    const JSON_PRIVAT = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";

    public function getExchange()
    {
        $exchangeData = json_decode(file_get_contents(static::JSON_PRIVAT), true);
        $exchangeResult = "Курс валют:";

        foreach ($exchangeData as $currency) {
            $exchangeResult .= "\n 1 " . $currency['ccy'] . " стоит " . $currency['buy'] . " " . $currency['base_ccy'];
        }

        return $exchangeResult;
    }
}