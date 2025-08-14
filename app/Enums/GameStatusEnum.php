<?php

namespace App\Enums;

enum GameStatusEnum: string
{
    case EN_COURS = 'En cours';
    case TERMINE = 'Terminé';
    case A_VENIR = 'À venir';
    case REPORTE = 'Reporté';
    case ANNULE = 'Annulé';
}