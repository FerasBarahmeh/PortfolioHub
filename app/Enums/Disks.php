<?php

namespace App\Enums;

enum Disks:string
{
    case Local = 'local';
    case Public = 'public';
    case S3 = 's3';
}
