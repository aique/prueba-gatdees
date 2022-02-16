# Complejidades

## Protocolos individuales

### Closest Enemy / Furthest Enemy

La complejidad de estos protocolos es **O(n + n) ≃ O(n)**.

Recorre una vez la colección completa de objetivos para identificar el valor
del enemigo más próximo / alejado. Una vez hecho ésto, vuelve a recorrerla y
se queda con aquellos que se encuentran a esa distancia.

### Assist Allies / Avoid Crossfire / Prioritize Mech / Avoid Mech

La complejidad de estos protocolos es **O(n)**.

Recorre una sóla vez la colección completa de objetivos y elimina aquellos
que no cumplen con la condición. A diferencia de la anterior, no hace falta
un primer recorrido para deducir la condición a cumplir.

## Combinación de protocolos

La complejidad de la combinación de protocolos es la suma de las complejidades
individuales de cada uno de ellos. Dado que todas las complejidades tienden a **O(n)**, la suma de varias de ellas
tenderá al mismo valor.
