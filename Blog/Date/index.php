<?php
        $timezone = new DateTimeZone("America/Sao_Paulo");   
        $entrada = new DateTime($row["data_postagem"]);
        $saida = new DateTime("now", $timezone);
        $d1 = $entrada->format('Y-m-d H:i:s');
        $d2 = $saida->format('Y-m-d H:i:s');

        $entrada_b = new DateTime($d1);
        $saida_b = new DateTime($d2);

        $interval = $entrada->diff($saida);
        if ($interval->y > 0) {
            $formattedDate = $interval->y . ($interval->y === 1 ? " ano" : " anos");
        } elseif ($interval->m > 0) {
            $formattedDate = $interval->m . ($interval->m === 1 ? " mês" : " meses");
        } elseif ($interval->d >= 7) {
            $weeks = floor($interval->d / 7);
            $formattedDate = $weeks . ($weeks === 1 ? " semana" : " semanas");
        } elseif ($interval->d > 0) {
            $formattedDate = $interval->d . ($interval->d === 1 ? " dia" : " dias");
        } elseif (intval((($saida_b->getTimestamp() - $entrada_b->getTimestamp()) / 60) / 60) > 0) {
            $formattedDate = $interval->h . ($interval->h === 1 ? " hora" : " horas");
        } elseif (intval(($saida_b->getTimestamp() - $entrada_b->getTimestamp()) / 60) >= 1) {
            $formattedDate = $interval->i . ($interval->i === 1 ? " minuto" : " minutos");
        } elseif (intval($saida_b->getTimestamp() - $entrada_b->getTimestamp()) >= 1) { 
            $formattedDate = $interval->s . ($interval->s === 1 ? " segundo" : " segundos");
        } else {
            $formattedDate = "Agora";
        }
        $formattedDate .= " atrás";
        
?>
