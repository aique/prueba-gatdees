<?php

namespace App\Entity\Protocol;

class ProtocolFactory
{
    public const CLOSEST_ENEMIES_PROTOCOL = 'closest-enemies';
    public const FURTHEST_ENEMIES_PROTOCOL = 'furthest-enemies';
    public const ASSIST_ALLIES_PROTOCOL = 'assist-allies';
    public const AVOID_CROSSFIRE_PROTOCOL = 'avoid-crossfire';
    public const PRIORITIZE_MECH_PROTOCOL = 'prioritize-mech';
    public const AVOID_MECH_PROTOCOL = 'avoid-mech';
}