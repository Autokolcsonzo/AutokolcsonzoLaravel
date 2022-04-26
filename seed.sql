/* 1. sql insert */
INSERT INTO `telephely` (`telephely_id`, `megye`, `ir_szam`, `varos`, `utca`, `hazszam`, `created_at`, `updated_at`) VALUES
(1, 'Pest', '1119', 'Budapest', 'Mérnök utca', '39', '2022-03-10 13:03:14', '2022-03-10 13:03:14'),
(2, 'Csongrád-Csanád', '6700', 'Szeged', 'Kossuth Lajos sugárút', '83', '2022-03-10 13:03:14', '2022-03-10 13:03:14'),
(3, 'Győr-Moson-Sopron', '9019', 'Győr', 'Rákóczi út', '12', '2022-03-10 13:03:14', '2022-03-10 13:03:14');

<<<<<<< HEAD

INSERT INTO `modell` (`modell_id`, `marka`, `tipus`, `modell`, `evjarat`, `kivitel`, `uzemanyag`, `teljesitmeny`, `created_at`, `updated_at`) VALUES
(1, 'BMW', 'X5mdfg34', 'X5', 2020, 'Kombi', 'Benzin', '300', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(2, 'Toyota', 'Toyota Yaris C300H2021', 'Yaris', 2021, 'Sedan', 'Hybrid', '200', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(3, 'Tesla', 'Tesla3K400E2021', 'Tesla', 2021, 'Sedan', 'Elektromos', '400', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(4, 'Ford', 'FordMustangS600', 'Mustang', 2022, 'Sport', 'Benzin', '600', '2022-03-10 13:45:06', '2022-03-10 13:45:06'),
(5, 'Ford', 'FordMustangS700B2022', 'Mustang', 2000, 'Sport Ultra', 'Benzin', '700', '2022-03-10 13:45:06', '2022-03-10 13:45:06'),
(6, 'Seat', 'Alhambra TSI Style', 'Alhambra', 2010, 'Családi', 'Dízel', '800', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(7, 'Dacia', 'Duster16', 'Duster', 2013, 'SUV', 'Benzin', '500', '2022-04-25 22:00:00', '2022-04-25 22:00:00');

INSERT INTO `modell_tulajdonsag` (`modell_tul_id`, `modell_id`, `tulajdonsag`, `created_at`, `updated_at`) VALUES
(1, 1, 'GPS, ABS, Tolató kamera, Ülésfűtés,', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(4, 7, 'GPS, ABS, Tolató kamera, Ülésfűtés,', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(9, 4, 'GPS, ABS, Ülésfűtés, ', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(12, 5, 'GPS, Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(14, 2, 'GPS, ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(16, 6, 'ABS, Tolató kamera', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(18, 3, 'GPS, Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00');
=======

INSERT INTO `modell_tulajdonsag` (`modell_tul_id`, `modell_id`, `tulajdonsag`, `created_at`, `updated_at`) VALUES
(5, 7, 'ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(8, 1, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(10, 4, 'ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(13, 5, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(14, 2, 'GPS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(17, 6, 'Tolató kamera', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(19, 3, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00');

INSERT INTO `modell_tulajdonsag` (`modell_tul_id`, `modell_id`, `tulajdonsag`, `created_at`, `updated_at`) VALUES
(1, 1, 'GPS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(2, 1, 'ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(3, 1, 'Tolató kamera', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(4, 7, 'GPS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(5, 7, 'ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(6, 7, 'Tolató kamera', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(7, 7, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(8, 1, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(9, 4, 'GPS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(10, 4, 'ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(11, 4, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(12, 5, 'GPS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(13, 5, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(14, 2, 'GPS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(15, 2, 'ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(16, 6, 'ABS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(17, 6, 'Tolató kamera', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(18, 3, 'GPS', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(19, 3, 'Ülésfűtés', '2022-04-25 22:00:00', '2022-04-25 22:00:00');
>>>>>>> 80b18e88cd7908ba0834b61b4d31897ea741a05b


INSERT INTO `auto` (`alvazSzam`, `modell`, `telephely`, `napiAr`, `szin`, `forgalmiSzam`, `statusz`, `rendszam`, `created_at`, `updated_at`) VALUES
('AAS123456789999', 5, 3, 10000, 'fekete', '666253566767788', 0, 'KWB222', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('BBS123456789999', 4, 1, 10000, 'fekete', '994253566767788', 0, 'KWB011', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('FDG123456789999', 3, 1, 13000, 'fekete', '876253566767788', 0, 'KWB102', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('FFD123456789999', 6, 3, 9000, 'piros', '555253566767788', 0, 'KWB555', NULL, NULL),
('FSD123456789999', 4, 3, 10000, 'szürke', '334253566767788', 0, 'KWB111', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('LDD123456789999', 1, 3, 5000, 'fekete', '544253566767788', 0, 'KWB004', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('LKJ123456789999', 3, 2, 13000, 'fekete', '554253566767788', 0, 'KWB204', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('RDD123456789999', 1, 1, 5000, 'fekete', '744253566767788', 0, 'KWB003', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('SDD123456789999', 7, 1, 4000, 'fekete', '114253566767788', 0, 'KWB009', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('SFG123456789999', 5, 1, 10000, 'fekete', '334253566767788', 0, 'KWB022', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('TDD123456789999', 7, 2, 4000, 'szürke', '944253566767788', 0, 'KWB007', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('TFD123456789999', 2, 3, 5000, 'fekete', '874253566767788', 0, 'KWB345', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('TFT123456789999', 2, 1, 5000, 'kék', '444453566767788', 0, 'KWB345', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('TTT123456789999', 2, 2, 5000, 'szürke', '445253566767788', 0, 'KWB546', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('VFG123456789999', 6, 2, 9000, 'piros', '785253566767788', 0, 'KWB245', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('WAD123456789999', 3, 1, 13000, 'szürke', '675253566767788', 0, 'KWB995', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('WDD123456789999', 1, 1, 5000, 'fekete', '344253566767788', 0, 'KWB001', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
('YXD123456789999', 6, 1, 9000, 'fekete', '897253566767788', 0, 'KWB123', '2022-04-25 22:00:00', '2022-04-25 22:00:00');

INSERT INTO `auto_extra` (`auto_extra_id`, `alvazSzam`, `extra_megnevezese`, `created_at`, `updated_at`) VALUES
(1, 'AAS123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(2, 'BBS123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(3, 'FDG123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(4, 'FFD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(5, 'FSD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(6, 'LDD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(7, 'LKJ123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(8, 'RDD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(9, 'SDD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(10, 'SFG123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(11, 'TDD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(12, 'TFD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(13, 'TFT123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(14, 'TTT123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(15, 'TTT123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(16, 'VFG123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(17, 'WAD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(18, 'WDD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(19, 'YXD123456789999', '5.1 hangszóró', '2022-04-25 22:00:00', '2022-04-25 22:00:00');


INSERT INTO `auto_kepek` (`auto_kep_id`, `alvazSzam`, `kep`, `kesz_datum`, `nyilvanose`, `created_at`, `updated_at`) VALUES
(1, 'AAS123456789999', '../kepek/autok/m3.jpg', '2022-04-26 09:45:48', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(2, 'BBS123456789999', '../kepek/autok/m2.png', '2022-04-26 09:50:33', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(3, 'FDG123456789999', '../kepek/autok/t1.jpeg', '2022-04-26 09:50:33', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(4, 'FFD123456789999', '../kepek/autok/s2.webp', '2022-04-26 09:52:18', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(5, 'FSD123456789999', '../kepek/autok/m1.jpg', '2022-04-26 09:52:18', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(6, 'LDD123456789999', '../kepek/autok/b1.jpg', '2022-04-26 09:54:38', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(7, 'LKJ123456789999', '../kepek/autok/t1.jpeg', '2022-04-26 09:54:38', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(8, 'RDD123456789999', '../kepek/autok/b1.jpg', '2022-04-26 09:55:41', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(9, 'SDD123456789999', '../kepek/autok/d3.jpg', '2022-04-26 09:55:41', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(10, 'SFG123456789999', '../kepek/autok/m2.png', '2022-04-26 09:58:23', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(11, 'TDD123456789999', '../kepek/autok/d2.webp', '2022-04-26 09:58:23', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(12, 'TFD123456789999', '../kepek/autok/y1.jpg', '2022-04-26 10:00:44', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(13, 'TFT123456789999', '../kepek/autok/y3.jpg', '2022-04-26 10:00:44', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(14, 'TTT123456789999', '../kepek/autok/y2.jpg', '2022-04-26 10:02:02', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(15, 'VFG123456789999', '../kepek/autok/s2.webp', '2022-04-26 10:02:02', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(16, 'WAD123456789999', '../kepek/autok/t2.jpg', '2022-04-26 10:02:57', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(17, 'WDD123456789999', '../kepek/autok/b1.jpg', '2022-04-26 10:02:57', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(18, 'YXD123456789999', '../kepek/autok/s1.jpeg', '2022-04-26 10:03:31', 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00');

INSERT INTO `kedvezmeny` (`szazalek_id`, `szazalek`, `naptol`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(2, 5, 3, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(3, 10, 7, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(4, 15, 10, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(5, 20, 15, '2022-04-25 22:00:00', '2022-04-25 22:00:00');


INSERT INTO `felhasznalo` (`felhasznalo_id`, `vezeteknev`, `keresztnev`, `felhasznalonev`, `jelszo`, `szul_ido`, `profilkep`, `ir_szam`, `megye`, `varos`, `utca`, `hazszam`, `tel_szam`, `e_mail`, `reg_datum`, `jogkor`, `telephely`, `created_at`, `updated_at`) VALUES
(1, 'teszt', 'felhasznalo', 'tesztfelhasznalo', '$2y$10$StVqpJk02g9qB6dGXroHNON.6CdDoIWMIKq5h.d1M1zrpFZ4l6.zm', '1994-06-26', '../kepek/profilkep.png', 'Teszt', 'Teszt', 'Teszt', 'Teszt', '1', '06304565845', 'tesztfelhasznalo@gmail.com', '2022-04-26 08:27:55', 1, NULL, '2022-04-26 06:27:55', '2022-04-26 06:27:55'),
(2, 'Teszt', 'Admin', 'tesztadmin', '$2y$10$BdeX9RWJEQJ59TB1CRbB4OSA8qNBdEJ5oxQ7VTbro5WqF1Fanx3CC', '1991-12-14', '../kepek/profilkep.png', 'Teszt', 'Teszt', 'Teszt', 'Teszt', '2', '06306775778', 'tesztadmin@gmail.com', '2022-04-26 08:29:47', 2, 1, '2022-04-26 06:29:17', '2022-04-26 06:29:17'),
(3, 'Illés', 'Lejla', 'lejla123', 'lejla123', '1997-03-22', '../kepek/profilkep.png', '2230', 'Pest', 'Gyömrő', 'Rákóczi utca', '97', '+06304545343', 'il970322@gmail.com', '2022-04-26 06:32:46', 2, 2, '2022-04-25 20:00:00', '2022-04-25 20:00:00'),
(4, 'Hecz', 'Klaudia', 'klau123', 'klau123', '1996-01-24', '../kepek/profilkep.png', '1171', 'Pest', 'Budapest', 'Borsó utca', '13', '+36301111111', 'klau@gmail.com', '2022-04-26 06:34:48', 2, 2, '2022-04-25 20:00:00', '2022-04-25 20:00:00'),
(5, 'Nagy', 'Katalin', 'kati123', 'kati123', '1991-06-24', '../kepek/profilkep.png', '1181', 'Pest', 'Budapest', 'Kocsis utca', '20', '+36303333333', 'kati@gmail.com', '2022-04-26 06:34:48', 1, NULL, '2022-04-25 20:00:00', '2022-04-25 20:00:00'),
(6, 'Kovács', 'István', 'istvan123', 'istvan123', '1991-06-24', '../kepek/profilkep.png', '9000', 'Győr-Moson-Sopron', 'Győr', 'Kis utca', '45', '+36304444444', 'istvan@gmail.com', '2022-04-26 06:34:48', 1, NULL, '2022-04-25 20:00:00', '2022-04-25 20:00:00'),
(7, 'Fekete', 'László', 'laszlo123', 'laszlo123', '1995-09-14', '../kepek/profilkep.png', '6700', 'Csongrád-Csanád', 'Szeged', 'Levél utca', '19', '+36305555555', 'laszlo@gmail.com', '2022-04-26 06:34:48', 1, NULL, '2022-04-25 20:00:00', '2022-04-25 20:00:00'),
(8, 'Kis', 'Anna', 'anna123', 'anna123', '1998-01-11', '../kepek/profilkep.png', '1181', 'Pest', 'Budapest', 'Petőfi utca', '98', '+36306666666', 'anna@gmail.com', '2022-04-26 06:34:48', 1, NULL, '2022-04-25 20:00:00', '2022-04-25 20:00:00'),
(9, 'Ménesi', 'Csaba', 'csaba123', 'csaba123', '1997-05-22', '../kepek/profilkep.png', '2260', 'Pest', 'Gyál', 'Rákóczi utca', '40', '+06304545252', 'csaba@gmail.com', '2022-04-26 06:32:46', 2, 3, '2022-04-25 20:00:00', '2022-04-25 20:00:00');

/* 2. sql insert */

INSERT INTO `foglalas` (`fogl_azonosito`, `alvazSzam`, `felhasznalo`, `elvitel`, `visszahozatal`, `fogl_kelt`, `ervenyessegi_ido`, `kedvezmeny`, `allapot`, `created_at`, `updated_at`) VALUES
(1, 'AAS123456789999', 5, '2022-03-01 12:21:53', '2022-03-16 12:21:53', '2022-02-01 11:24:01', '2022-03-16 12:21:53', 3, 'Teljesítve', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(2, 'BBS123456789999', 5, '2022-04-01 12:21:53', '2022-04-03 12:21:53', '2022-03-25 11:24:01', '2022-04-03 12:21:53', 1, 'Teljesítve', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(3, 'SFG123456789999', 6, '2022-04-10 12:24:04', '2022-04-16 12:24:04', '2022-04-01 10:24:04', '2022-04-26 12:24:04', 2, 'Teljesítve', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(4, 'WAD123456789999', 8, '2022-04-17 12:25:32', '2022-04-19 12:25:32', '2022-03-25 11:25:32', '2022-04-26 12:25:32', 1, 'Lemondva', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(6, 'VFG123456789999', 8, '2022-04-26 12:26:14', '2022-04-30 12:26:14', '2022-04-26 10:27:12', '2022-04-30 12:26:14', 2, 'Aktív', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(7, 'TFT123456789999', 1, '2022-04-20 12:27:14', '2022-04-26 12:27:14', '2022-04-02 10:27:14', '2022-04-26 12:27:14', 2, 'Teljesítve', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(8, 'WDD123456789999', 1, '2022-03-04 12:28:23', '2022-04-02 12:28:23', '2022-04-26 10:29:24', '2022-04-26 12:28:23', 5, 'Teljesítve', '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(9, 'SDD123456789999', 1, '2022-04-26 16:00:00', '2022-05-06 15:00:00', '2022-04-26 10:31:54', '2022-05-06 00:00:00', 4, 'Aktív', '2022-04-26 08:31:54', '2022-04-26 08:31:54');

/* 3. sql insert */
             
INSERT INTO `fizetes` (`kifizetes_id`, `fogl_azonosito`, `kelt`, `sorszam`, `fizetes_alapja`, `befizetett_osszeg`, `kifizetendo_osszeg`, `created_at`, `updated_at`) VALUES
(1, 9, '2022-04-26 10:31:54', 0, 'foglalás létrehozva', 0, 42240, '2022-04-26 08:31:54', '2022-04-26 08:31:54'),
(2, 6, '2022-04-26 10:34:56', 0, 'Előleg', 50000, 10000, '2022-04-25 22:00:00', '2022-04-25 22:00:00'),
(3, 6, '2022-04-26 10:27:59', 0, 'foglalás létrehozva', 0, 70000, '2022-04-26 10:27:59', NULL),
(4, 7, '2022-04-02 10:27:14', 0, 'Előleg', 10000, 60000, '2022-04-02 10:27:14', '2022-04-02 10:27:14');
