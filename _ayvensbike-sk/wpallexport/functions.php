<?php

function ayvens_bike_installment($price)
{
    // Hardcoded calculator parameters (from BikeLeasing.sk formula)
    $doba_najmu = 24;
    $urok_v_percent = 8.5;
    $zh_v_percent = 10.0;
    $rocni_sazba_pojisteni = 3.13;
    $asistence = 0.0;
    $registracni_poplatek = 0.0;
    $akontace = 0.0;
    $splatka_servis_doba_najmu = 24;
    $spravni_poplatek = 0.0;

    // Get tax rates and calculate taxes
    $tax_rate = 0.23;

    $kolo_bez_dph = round($price / (1 + $tax_rate), 2);

    // Service fee lookup (if calculator has servis array)
    $servis = 0;

    // Calculate monthly interest rate
    $monthly_rate = ($urok_v_percent * 0.01) / 12;

    // Calculate residual value (zh_vysledna)
    $zh_vysledna = $kolo_bez_dph / 100 * $zh_v_percent;

    // Calculate present value (pv)
    $pv = $kolo_bez_dph + $registracni_poplatek - $akontace;

    // Calculate future value factor
    $future_value_factor = pow(1 + $monthly_rate, $doba_najmu);

    // Calculate numerator: -(zh_vysledna) + pv * future_value_factor
    $numerator = - ($zh_vysledna) + $pv * $future_value_factor;

    // Calculate denominator part 1: 1 + monthly_rate * 1
    $denominator_part1 = 1 + $monthly_rate * 1;

    // Calculate denominator part 2: (future_value_factor - 1) / monthly_rate
    $denominator_part2 = ($future_value_factor - 1) / $monthly_rate;

    // Calculate financial payment (PMT-like calculation)
    $financial_payment = $numerator / $denominator_part1 / $denominator_part2;

    // Calculate service payment
    $service_payment = ($servis / $splatka_servis_doba_najmu) * 1.1;

    // Calculate insurance payment
    $insurance_payment = (
        ($kolo_bez_dph * $rocni_sazba_pojisteni * ($doba_najmu / 12) / 100)
        / $doba_najmu
    ) * 1.2;

    // Calculate total monthly payment (without VAT)
    $installment =
         $financial_payment
        + $service_payment
        + $spravni_poplatek
        + $insurance_payment
        + $asistence;

    // Ensure minimum price of 1
    if ($installment < 1) {
        $installment = 1;
    }

    // Round final result to integer (standard rounding)
    $installment_gross = round($installment * 1.23, 2);
    $installment_net = round($installment_gross / 1.23, 2);

    return $installment_net;
}
