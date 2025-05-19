<?php

use Carbon\Carbon;

if (!function_exists('waktu_sisa')) {
    /**
     * Hitung sisa waktu dari sekarang ke deadline
     * @param string|DateTime $deadline
     * @return string contoh: "1 bulan 1 minggu 2 hari lagi"
     */
    function waktu_sisa($deadline)
    {
        $now = Carbon::now();
        $end = Carbon::parse($deadline);

        if ($now->greaterThan($end)) {
            return "Waktu sudah lewat";
        }

        $diff = $now->diff($end);

        $parts = [];
        if ($diff->y) $parts[] = $diff->y . ' tahun';
        if ($diff->m) $parts[] = $diff->m . ' bulan';
        if ($diff->d >= 7) {
            $weeks = floor($diff->d / 7);
            $days = $diff->d % 7;
            if ($weeks) $parts[] = $weeks . ' minggu';
            if ($days) $parts[] = $days . ' hari';
        } else {
            if ($diff->d) $parts[] = $diff->d . ' hari';
        }
        if ($diff->h) $parts[] = $diff->h . ' jam';
        if ($diff->i) $parts[] = $diff->i . ' menit';

        return implode(' ', $parts) . ' lagi';
    }
}

if (!function_exists('waktu_terlewat')) {
    /**
     * Hitung waktu yang sudah lewat dari waktu tertentu sampai sekarang
     * @param string|DateTime $waktu
     * @return string contoh: "1 jam yang lalu", "2 bulan yang lalu"
     */
    function waktu_terlewat($waktu)
    {
        $now = Carbon::now();
        $past = Carbon::parse($waktu);
        $diff = $past->diff($now);

        if ($diff->y) return $diff->y . ' tahun yang lalu';
        if ($diff->m) return $diff->m . ' bulan yang lalu';
        if ($diff->d >= 7) return floor($diff->d / 7) . ' minggu yang lalu';
        if ($diff->d) return $diff->d . ' hari yang lalu';
        if ($diff->h) return $diff->h . ' jam yang lalu';
        if ($diff->i) return $diff->i . ' menit yang lalu';
        return 'baru saja';
    }
}
