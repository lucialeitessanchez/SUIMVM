SELECT
  'sdh_1_1' AS campo,
  s.id_sdh,
  s.sdh_1_1 AS valor,
  n.descripcion
FROM sdh s
JOIN test_nomenclador_campos n ON n.codigo = 'sdh_1_1'

UNION ALL

SELECT
  'sdh_1_2' AS campo,
  s.id_sdh,
  s.sdh_1_2 AS valor,
  n.descripcion
FROM sdh s
JOIN test_nomenclador_campos n ON n.codigo = 'sdh_1_2'

UNION ALL

SELECT
  'sdh_1_5' AS campo,
  s.id_sdh,
  s.sdh_1_5 AS valor,
  n.descripcion
FROM sdh s
JOIN test_nomenclador_campos n ON n.codigo = 'sdh_1_5';
