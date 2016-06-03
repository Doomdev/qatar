<?php

namespace qatarBundle\Model;

class Horaires
{
    static $coeff = array(
        'semaine' => 1,
        'weekend' => 2
    );

    static $horaires = array(
        'semaine' => array(
            '11H00 - 12H00',
            '12H00 - 13H00',
            '13H00 - 14H00',
            '14H00 - 15H00',
            '15H00 - 16H00',
            '16H00 - 17H00',
            '17H00 - 18H00',
            '18H00 - 19H00',
            '19H00 - 20H00',
        ),
        'weekend' => array(
            '08H00 - 10H00',
            '10H00 - 12H00',
            '12H00 - 14H00',
            '14H00 - 16H00',
            '16H00 - 18H00',
            '18H00 - 20H00',
        )
    );
}