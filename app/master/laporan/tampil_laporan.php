<?php

SELECT * FROM nama_tabel
WHERE tanggal >='" .  $_post['tgl_awal'] . "'  AND
tanggal >='" . $_post['tgl_akhir'] . "'
atau
SELECT * FROM nama_tabel
WHERE tanggal BETWEEN $_post['tgl_awal'] AND '" .  $_post['tgl_akhir'] . "'